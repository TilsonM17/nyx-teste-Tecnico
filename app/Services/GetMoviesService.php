<?php

namespace App\Services;

use App\Models\AlugarFilme;
use Illuminate\Support\Arr;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class GetMoviesService
{

    private string $url;

    private string $key;

    public function __construct()
    {
        $this->key = config('themoviedb.key');
        $this->url = $this->constructString();
    }

    /**
     * @return string
     * 
     */
    private function constructString(): string
    {
        return config('themoviedb.url') . '?api_key=' . $this->key . '&query=';
    }

    private function constructStringById(int $id): string
    {
        return config('themoviedb.url_by_id') . $id . '?api_key=' . config('themoviedb.key');
    }

    /**
     * @param string $queryString
     * @return \Illuminate\Http\Client\Response
     */
    public function searchMovies(string $querySearch): \Illuminate\Http\Client\Response
    {
        return Http::get($this->url . $querySearch);
    }
    /**
     * @param string $queryString
     * @return \Illuminate\Http\Client\Response
     */
    public function searchMoviesForPaginator(string $querySearch, int $pageNumber): \Illuminate\Http\Client\Response
    {
        return Http::get($this->url . $querySearch . '&page=' . $pageNumber);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Client\Response
     */
    public function searchMoviesById(int $id)
    {
        $urlById = $this->constructStringById($id);
        return Http::get($urlById);
    }

    /**
     * 
     * @return \Illuminate\Support\Collection
     */
    public function getInformationAboutMovies($alugarFilme)
    {
        $titulos = [];
        $alugarFilme->map(function ($item) use (&$titulos) {
            $titulos[$item->filme_id] = $this->searchMoviesById($item->filme_id)
                ->object()
                ->original_title;
        });
        return $this->joinInformationMovies($titulos, $alugarFilme);
    }

    private function joinInformationMovies(array $titulos, \Illuminate\Support\Collection $filmes)
    {
        $filmes->map(function ($item) use ($titulos) {
            $item['nome_filme'] = $titulos[$item->filme_id];
        });

       return $filmes;
    }
}
