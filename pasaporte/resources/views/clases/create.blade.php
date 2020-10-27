@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Registrar') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('clases.store')}}">
        @csrf

        <div class="form-group row">
            <label for="clase_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="clase_nombre" type="text" class="form-control @error('clase_nombre') is-invalid error-input @enderror" name="clase_nombre" value="{{ old('clase_nombre') }}" required autocomplete="clase_nombre" autofocus placeholder="Atletismo">
                @error('clase_nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="clase_hora_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Hora de inicio') }}</label>
            <div class="col-md-6">
                <input id="clase_hora_inicio" type="time" class="form-control @error('clase_hora_inicio') is-invalid error-input @enderror" name="clase_hora_inicio" value="{{ old('clase_hora_inicio') }}" required autocomplete="clase_hora_inicio" autofocus>
                @error('clase_hora_inicio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="clase_hora_fin" class="col-md-4 col-form-label text-md-right">{{ __('Hora de finalización') }}</label>
            <div class="col-md-6">
                <input id="clase_hora_fin" type="time" class="form-control @error('clase_hora_fin') is-invalid error-input @enderror" name="clase_hora_fin" value="{{ old('clase_hora_fin') }}" required autocomplete="clase_hora_fin" autofocus>
                @error('clase_hora_fin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="coach_id" class="col-md-4 col-form-label text-md-right">{{ __('Coach') }}</label>
            <div class="col-md-6">
                <select id="coach_id" type="text" class="custom-select @error('coach_id') is-invalid error-input @enderror" name="coach_id" value="{{ old('coach_id') }}" required autocomplete="coach_id" autofocus>
                    @foreach($coaches as $coach)
                    <option value="{{$coach->id}}">{{$coach->coach_nombre}}</option>
                    @endforeach
                </select>
                @error('coach_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="dias" class="col-md-4 col-form-label text-md-right">{{ __('Días') }}</label>
            <div class="col-md-6">
                <select id="dias" type="text" class="custom-select @error('dias') is-invalid error-input @enderror" name="dias[]" value="{{ old('$clase->dias') }}" required autocomplete="dias" autofocus multiple>
                    @foreach($dias as $dia)
                    <option value="{{$dia->id}}">{{$dia->dia_nombre}}</option>
                    @endforeach
                </select>
                @error('dias')
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