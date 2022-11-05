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

    public function searchMovies(string $querySearch)
    {
        return Http::get($this->url . $querySearch);
    }

    /**
     * @return string
     * 
     */
    private function constructString(): string
    {
        return config('themoviedb.url') . '?api_key=' . $this->key . '&query=';
    }
}
