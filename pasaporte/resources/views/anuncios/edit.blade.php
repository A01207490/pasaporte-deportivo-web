@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Edit') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('anuncios.update', $anuncio)}}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="anuncio_titulo" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
            <div class="col-md-6">
                <input id="anuncio_titulo" type="text" class="form-control @error('anuncio_titulo') is-invalid error-input @enderror" name="anuncio_titulo" value="{{ $anuncio->anuncio_titulo }}" required autocomplete="anuncio_titulo" autofocus>
                @error('anuncio_titulo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="anuncio_cuerpo" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>
            <div class="col-md-6">
                <textarea rows="15" id="anuncio_cuerpo" type="text" class="form-control @error('anuncio_cuerpo') is-invalid error-input @enderror" name="anuncio_cuerpo" value="{{ $anuncio->anuncio_cuerpo }}" required autocomplete="anuncio_cuerpo" autofocus>{{ $anuncio->anuncio_cuerpo }}</textarea>
                @error('anuncio_cuerpo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aceptar') }}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection