<?php

namespace App\Http\Controllers;

use App\Helpers\PaginationHelper;
use App\Http\Requests\SearchRequest;
use App\Services\GetMoviesService;
use Illuminate\Http\Request;

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
        $objectResponse = $this->getMoviesServices->searchMovies($request->input('txt_pesquisa'));
        if ($objectResponse->failed()) {
            echo "Erro";
             //redirect('home_page')->with('status','Não encontramos resultados com esta pesquisa');
        } else {
           return view('pages.list_movies',['movies' => $objectResponse->object()]);
        }
    }
}
