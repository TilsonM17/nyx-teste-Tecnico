<?php

namespace App\Http\Controllers;

use App\Helpers\PaginationHelper;
use App\Http\Requests\AlugarSubmitRequest;
use App\Http\Requests\SearchRequest;
use App\Models\AlugarFilme;
use App\Services\GetMoviesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class MainController extends Controller
{
    /**
     * @var GetMoviesService $getMoviesServices
     */
    private GetMoviesService $getMoviesServices;

    public function __construct(GetMoviesService $service)
    {
        $this->getMoviesServices = $service;
    }

    public function index()
    {
        return view('welcome');
    }

    public function search(SearchRequest $request)
    {
        if (!Redis::get($request->input('txt_pesquisa'))) {

            Redis::set($request->input('txt_pesquisa'), serialize(
                $this->getMoviesServices->searchMovies($request->input('txt_pesquisa'))->object()
            ));
        }

        Redis::set('key', serialize($request->input('txt_pesquisa')));
        return redirect()->route('list');
    }

    public function paginator($pageNumber)
    {
        $textoPesquisado = unserialize(Redis::get('key'));
        $chaveRedis = 'key_page_' . $pageNumber;
        if (!Redis::get($chaveRedis)) {
            Redis::set($chaveRedis, serialize(
                $this->getMoviesServices->searchMoviesForPaginator($textoPesquisado, $pageNumber)->object()
            ));
        }
        return view('pages.list_movies', ['movies' => unserialize(Redis::get($chaveRedis))]);
    }

    public function listMovies()
    {
        $chaveRedis = unserialize(Redis::get('key'));
        $dataObject = unserialize(Redis::get($chaveRedis));
        return view('pages.list_movies', ['movies' => $dataObject]);
    }

    public function alugarFilme(int $id)
    {
        $chave = 'movie_' . $id;
        if (!unserialize(Redis::get($chave))) {
            Redis::set($chave, serialize(
                $this->getMoviesServices->searchMoviesById($id)->object()
            ));
        }

        return view('pages.form_shop_movies', ['movie' => unserialize(Redis::get($chave))]);
    }

    public function alugarFilmeSubmit(AlugarSubmitRequest $request)
    {
        AlugarFilme::create([
            'filme_id' => $request->input('movie_id'),
            'nome' => $request->input('txt_nome'),
            'email' => $request->input('txt_email'),
            'data_expiracao' => now()->addDays(2)
        ]);

        return redirect()->route('home_page')->with('status', 'Alugado com sucesso');
    }
}
