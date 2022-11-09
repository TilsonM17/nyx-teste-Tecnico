<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home_page');

Route::post('/search', [MainController::class, 'search'])->name("pesquisar");

Route::get('/list',[MainController::class,'listMovies'])->name('list');

Route::get('/page/{pageNumber}', [MainController::class,'paginator'])->name('paginator');

Route::get('/alugar/{id}',[MainController::class,'alugarFilme'])->name('alugar');

Route::post('/alugar',[MainController::class,'alugarFilmeSubmit'])->name('alugarSubmit');