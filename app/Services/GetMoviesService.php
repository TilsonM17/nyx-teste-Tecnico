<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GetMoviesService
{

    private string $url;

    private string $key;

    public function __construct()
    {
        $this->url = $this->constructString();
        $this->key = config('themoviedb.key');
    }

    public function searchMovies(string $querySearch)
    {
        return $this->url.$querySearch;
    }

    /**
     * @return string
     * 
     */
    private function constructString(): string
    {
        return config('themoviedb.url').'?api_key='.$this->key.'&query='; 
    }
}
