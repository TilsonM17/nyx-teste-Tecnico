<?php

namespace App\Http\Controllers;

use App\Models\AlugarFilme;
use App\Services\GetMoviesService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private GetMoviesService $service;

    public function __construct(GetMoviesService $service)
    {
        $this->service = $service;
    }
    public function listarTodosAlugueis()
    {
        $allMovies = AlugarFilme::orderByDesc('id')->get();
        if ($allMovies->count() > 0) {
            $allMovies = $this->service->getInformationAboutMovies($allMovies);
        }
        return view('admin.listar_todos_alugueis', ['movies' => $allMovies]);
    }
}
