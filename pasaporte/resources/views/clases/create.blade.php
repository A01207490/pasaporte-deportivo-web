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
        <h3>Agregar Clase</h3>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center align-items-center">
    <form method="POST" action="/clases" class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
        @csrf
        <div class="form-group w-100">
            <label>Nombre</label>
            <input name="clase_nombre" type="text" class="form-control @error('clase_nombre') error-input @enderror" value="{{ old('clase_nombre')}}" required>
            @error('clase_nombre')
            <div class="alert alert-red p-1 mt-2">
                {{ $errors->first('clase_nombre')}}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Hora de inicio</label>
            <input name="clase_hora_inicio" type="time" class="form-control @error('clase_hora_inicio') error-input @enderror" value="{{ old('clase_hora_inicio')}}" required>
            @error('clase_hora_inicio')
            <div class="alert alert-red p-1 mt-2">
                {{ $errors->first('clase_hora_inicio')}}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Hora de finalización</label>
            <input name="clase_hora_fin" type="time" class="form-control @error('clase_hora_fin') error-input @enderror" value="{{ old('clase_hora_fin')}}" required>
            @error('clase_hora_fin')
            <div class="alert alert-red p-1 mt-2">
                {{ $errors->first('clase_hora_fin')}}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Hora de finalización</label>
            <select class="custom-select" multiple>

                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Aceptar
        </button>
    </form>
</div>

@endsection