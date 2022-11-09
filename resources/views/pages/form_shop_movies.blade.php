@extends('template.app')
@section('title', 'Alugar Filme')

@section('content')


    <div class="col-md-12 mt-4 text-center">
        <p class="h3">Alugar: <b> {{ $movie->original_title }}</b></p>

        <figure class="figure">
            <img src="{{ config('themoviedb.img_url') . $movie->poster_path }}" class="img-thumbnail rounded mx-auto d-block"
                alt="Imagem de Capa">
            </figcaption>
        </figure>
        <p>Para poder alugar este filme, porfavor preencha o formulario.</p>
    </div>
    

    <form method="POST" action="{{ route('alugarSubmit') }}">
        @csrf
        <div class="form-group">

            <input type="hidden" name="movie_id" value="{{$movie->id}}">
            <label for="exampleInputPassword1">Nome</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="txt_nome"
                placeholder="Digite seu Nome">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="txt_email" aria-describedby="emailHelp"
                placeholder="Seu email">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <button type="submit" class="btn btn-primary">Alugar</button>
    </form>

@endsection
