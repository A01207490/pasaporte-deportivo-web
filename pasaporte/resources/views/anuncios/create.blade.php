@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Registrar') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('anuncios.store')}}">
        @csrf

        <div class="form-group row">
            <label for="anuncio_titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
            <div class="col-md-6">
                <input id="anuncio_titulo" type="text" class="form-control @error('anuncio_titulo') is-invalid error-input @enderror" name="anuncio_titulo" value="{{ old('anuncio_titulo') }}" required autocomplete="anuncio_titulo" autofocus>
                @error('anuncio_titulo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="anuncio_cuerpo" class="col-md-4 col-form-label text-md-right">{{ __('Cuerpo') }}</label>
            <div class="col-md-6">
                <textarea rows="5" id="anuncio_cuerpo" type="text" class="form-control @error('anuncio_cuerpo') is-invalid error-input @enderror" name="anuncio_cuerpo" value="{{ old('anuncio_cuerpo') }}" required autocomplete="anuncio_cuerpo" autofocus>
                </textarea>
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
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection