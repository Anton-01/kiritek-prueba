@extends('welcome')
@section('main')
<div class="row mt-4 justify-content-center">
    <h3>Todos los libros</h3>
</div>
<div class="row">
    @forelse ($response['content'] as $item)
    <div class="col-md-4">
        <div class="card mt-5" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $item['titulo'] }} {{ $item['id'] }}</h5>
                <p class="card-text">{{ $item['sinopsis'] }}</p>
                <a href="{{ route('books.show', $item['id']) }}" class="btn btn-primary">Detalles</a>
            </div>
        </div>
    </div>
    @empty
    <p>No hay libros disponibles para mostar</p>
    @endforelse
</div>
@if ( $response['totalPages'] > 1 )
<div class="row justify-content-center mt-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            @for ($i = 0; $i < $response['totalPages']; $i++) <li class="page-item">
                <a class="page-link" href="{{ route('books', $i) }}">{{ $i+1 }}</a>
                </li>
                @endfor
        </ul>
    </nav>
</div>
@endif
@endsection
