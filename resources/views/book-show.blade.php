@extends('welcome')
@section('main')
<div class="card mb-3 mt-5">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $book['titulo'] }}</h5>
        <span class="text-muted">Publicación: {{ $book['publicacion'] }}</span>
        <p class="card-text">{{ $book['sinopsis'] }}</p>
    </div>
</div>
<hr>
<div>
    <h6>Deja tu comentario</h6>
    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <div class="form-group">
            <textarea name="comentario"cols="5" rows="2" class="form-control"></textarea>
        </div>
        @error('comentario')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <input type="hidden" name="id" value="{{ $book['id'] }}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-small">
                comentar
            </button>
        </div>
    </form>
</div>
<hr>
<div>
    <h6>Todos los comentarios</h6>
    @forelse ($comments as $item)
        <div class="alert alert-dark" role="alert">
            {{ $item['comentario'] }}
        </div>
    @empty
        <div class="alert alert-dark" role="alert">
        No hay comentarios por el momento
        </div>
    @endforelse
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a href="https://localhost:8585/api/books/credentials-user" target="_blank">
            Iniciar Sesión
        </a>
    </div>
</div>
@endsection
