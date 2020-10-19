@extends('welcome')

@section('main')
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nombre">
        @error('nombre')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Sinopsis</label>
        <textarea class="form-control" name="sinopsis" id="" cols="30" rows="10"></textarea>
        @error('sinopsis')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Guardar libro
        </button>
    </div>
</form>
@endsection
