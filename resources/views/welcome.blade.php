@extends('template.app')
@section('title', 'Home Page')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <p class="h2 text-center">Alugue um Filme ou Serie</p>
        </div>

        @if (session('status'))
            <div class="col-md-12 alert alert-success" role="alert">
                <p class="h4  text-center">{{ session('status') }}</p>
            </div>
        @endif

        <form action="{{ route('pesquisar') }}" method="post">
            @csrf
            <div class="">
                <div class="offset-md-2 col-md-4">
                    <input type="text" placeholder="Pesquise por um filme ou serie" name="txt_pesquisa"
                        class="form-control" required>
                </div>
                <div class="offset-md-2 col-md-4">
                    <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
                </div>
            </div>


        </form>


    </div>

@endsection
