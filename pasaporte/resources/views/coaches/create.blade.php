@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Editar') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('coaches.store')}}">
        @csrf

        <div class="form-group row">
            <label for="coach_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="coach_nombre" type="text" class="form-control @error('coach_nombre') is-invalid error-input @enderror" name="coach_nombre" value="{{ old('coach_nombre') }}" required autocomplete="coach_nombre" autofocus>
                @error('coach_correo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="coach_correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
            <div class="col-md-6">
                <input id="coach_correo" type="text" class="form-control @error('coach_correo') is-invalid error-input @enderror" name="coach_correo" value="{{ old('coach_correo') }}" required autocomplete="coach_correo" autofocus>
                @error('coach_correo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="coach_nomina" class="col-md-4 col-form-label text-md-right">{{ __('Nómina') }}</label>
            <div class="col-md-6">
                <input id="coach_nomina" type="text" class="form-control @error('coach_nomina') is-invalid error-input @enderror" name="coach_nomina" value="{{ old('coach_nomina') }}" required autocomplete="coach_nomina" autofocus>
                @error('coach_nomina')
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