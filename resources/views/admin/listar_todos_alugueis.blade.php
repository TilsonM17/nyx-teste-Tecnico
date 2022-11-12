@extends('template.app')
@section('title', 'Alugar Filme')

@section('content')

    <h2 class="text-center mt-5">Filmes Alugados.</h2>
    @if (!$movies->count() > 0)
        <div class=" col-md-12 text-center alert alert-danger" role="alert">
            <p class="h4">Não tem registro de aluguel!</p>
        </div>
        <a href="{{ route('home_page') }}" class="btn btn-outline-primary text-center">Alugar Filme</a>
    @else
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Nome Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Titulo do Filme</th>
                    <th scope="col">Data do Aluguel</th>
                    <th scope="col">Termino do Aluguel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $item)
                    <tr>
                        <th scope="row">{{ $item->nome }}</th>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nome_filme }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->data_expiracao }}</td>
                    </tr>
                @endforeach

                <p> Total de Registros: <strong> {{ $item->count() }} </strong> </p>


            </tbody>
        </table>

    @endif


@endsection
