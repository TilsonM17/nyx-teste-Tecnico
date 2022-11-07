<?php

namespace App\Services;

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
    public function searchMoviesForPaginator(string $querySearch,int $pageNumber): \Illuminate\Http\Client\Response
    {
        return Http::get($this->url . $querySearch.'&page='.$pageNumber);
    }
}
