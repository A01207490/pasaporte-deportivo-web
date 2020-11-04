@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Edit') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('clases.update', $clase)}}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="clase_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="clase_nombre" type="text" class="form-control @error('clase_nombre') is-invalid error-input @enderror" name="clase_nombre" value="{{ $clase->clase_nombre }}" required autocomplete="clase_nombre" autofocus>
                @error('clase_nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="clase_hora_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Start hour') }}</label>
            <div class="col-md-6">
                <input id="clase_hora_inicio" type="time" class="form-control @error('clase_hora_inicio') is-invalid error-input @enderror" name="clase_hora_inicio" value="{{ \Carbon\Carbon::parse($clase->clase_hora_inicio)->format('h:i') }}" required autocomplete="clase_hora_inicio" autofocus>
                @error('clase_hora_inicio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="clase_hora_fin" class="col-md-4 col-form-label text-md-right">{{ __('End hour') }}</label>
            <div class="col-md-6">
                <input id="clase_hora_fin" type="time" class="form-control @error('clase_hora_fin') is-invalid error-input @enderror" name="clase_hora_fin" value="{{ \Carbon\Carbon::parse($clase->clase_hora_fin)->format('h:i') }}" required autocomplete="clase_hora_fin" autofocus>
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
                <select id="coach_id" type="text" class="custom-select @error('coach_id') is-invalid error-input @enderror" name="coach_id" value="{{ $clase->coach_id }}" required autocomplete="coach_id" autofocus>
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
            <label for="dias" class="col-md-4 col-form-label text-md-right">{{ __('Days') }}</label>
            <div class="col-md-6">
                <select id="dias" type="text" class="custom-select @error('dias') is-invalid error-input @enderror" name="dias[]" required autofocus multiple>
                    @foreach($dias as $dia)
                    <option value="{{$dia->id}}" {{ in_array($dia->id, $clase->dias()->get()->pluck('id')->toArray()) ? 'selected' : '' }}>{{$dia->dia_nombre}}</option>
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
                    {{ __('Accept') }}
                </button>
            </div>
        </div>

    </form>
</div>

@endsection