@extends('template.app')
@section('title', 'Resultados da pesquisa')

@section('content')

    <div class="col-md-12 mt-2 text-center">
        <h2>Resultados da pesquisa</h2>
    </div>
    <div class="row my-4">
        <div class="col-md-12">

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
        <hr>
        @foreach ($movies->results as $movie)
            <div class="col-md-4 border border-end-0">
                <p class="h3 text-center">{{ $movie->title }}</p>
                <figure class="figure">
                    <img src="{{ config('themoviedb.img_url') . $movie->poster_path }}"
                        class="img-thumbnail rounded mx-auto d-block" alt="Imagem de Capa">
                    <figcaption class="figure-caption">{{ $movie->overview ?? 'Não foi forneçido uma descrição.' }}</figcaption>
                </figure>
                <p>Data de Lançamento: <strong> {{ $movie->release_date ?? 'DD/MM/YY' }} </strong> </p>

            </div>
        @endforeach

    </div>
    <hr>
    <div class="col-md-12">
        <p class="ml-5">Total de Registros <strong>{{ $movies->total_results }}</strong></p>
        <p>Pagina Numero: <strong>{{ $movies->page }}</strong> </p>
    </div>
    <div class="col-md-12 text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @for ($i = 1; $i < $movies->total_pages; $i++)
                    <li class="page-item">
                        <a class="page-link" href="{{ route('paginator',['pageNumber' => $i]) }}">{{ $i }}</a>
                    </li>
                @endfor
                {{--
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
            --}}
            </ul>
        </nav>
    </div>




@endsection
