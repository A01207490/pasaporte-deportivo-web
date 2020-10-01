@extends('layouts.app')

@section('content')
<style>
    .error-input {
        border: 2px solid #FD8080;
    }
</style>
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <div class="bd-highlight">
        <h3>Editar clase</h3>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{route('clases.update', $clase)}}" class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
        @csrf
        @method('PUT')
        <div class="form-group w-100">
            <label>Nombre</label>
            <input name="clase_nombre" type="text" class="form-control @error('clase_nomina') error-input @enderror" value="{{ $clase->clase_nombre }}" required>
            @error('clase_nombre')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Hora de inicio</label>
            <input name="clase_hora_inicio" type="time" class="form-control @error('clase_hora_inicio') error-input @enderror" value="{{ $clase->clase_hora_inicio }}" required>
            @error('clase_hora_inicio')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Hora de finalización</label>
            <input name="clase_hora_fin" type="time" class="form-control @error('clase_hora_fin') error-input @enderror" value="{{ $clase->clase_hora_fin }}" required>
            @error('clase_hora_fin')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Coach</label>
            <select name='coach_id' class="form-control @error('coach_id') error-input @enderror" value="{{ $clase->coach_id }}" required>
                @foreach($coaches as $coach)
                <option value="{{$coach->id}}">{{$coach->coach_nombre}}</option>
                @endforeach
            </select>
            @error('coach_id')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Dias</label>
            <select name='dias[]' class="form-control @error('dias') error-input @enderror" value="" multiple required>
                @foreach($dias as $dia)
                <option value="{{$dia->id}}">{{$dia->dia_nombre}}</option>
                @endforeach
            </select>
            @error('dias')
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