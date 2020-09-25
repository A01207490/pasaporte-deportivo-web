@extends("layout")
@section('head')
@endsection
@section("content")
<style>
    .error-input {
        border: 2px solid #FD8080;
    }
</style>
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <div class="bd-highlight">
        <h3>Agregar anuncio</h3>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{route('anuncios.store')}}" class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
        @csrf
        <div class="form-group w-100">
            <label>Título</label>
            <input name="anuncio_titulo" type="text" class="form-control @error('anuncio_titulo') error-input @enderror" value="{{ old('anuncio_titulo')}}" required>
            @error('anuncio_titulo')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Cuerpo</label>
            <textarea name="anuncio_cuerpo" class="form-control" rows="5" class="form-control @error('anuncio_cuerpo') error-input @enderror" value="{{ old('anuncio_cuerpo')}}" required></textarea>
            @error('anuncio_cuerpo')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Aceptar
        </button>
    </form>
</div>

@endsection