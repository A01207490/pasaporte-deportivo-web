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
        <h3>Agregar Coach</h3>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{route('coaches.store')}}" class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
        @csrf
        <div class="form-group w-100">
            <label>Nombre</label>
            <input name="coach_nombre" type="text" class="form-control @error('coach_nombre') error-input @enderror" value="{{ old('coach_nombre')}}" required>
            @error('coach_nombre')
            <div class="alert alert-red p-1 mt-2">
                {{ $errors->first('coach_nombre')}}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Correo</label>
            <input name="coach_correo" type="email" class="form-control @error('coach_correo') error-input @enderror" value="{{ old('coach_correo')}}" required>
            @error('coach_correo')
            <div class="alert alert-red p-1 mt-2">
                {{ $errors->first('coach_correo')}}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Nómina</label>
            <input name="coach_nomina" type="text" class="form-control @error('coach_nomina') error-input @enderror" value="{{ old('coach_nomina')}}" required>
            @error('coach_nomina')
            <div class="alert alert-red p-1 mt-2">
                {{ $errors->first('coach_nomina')}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Aceptar
        </button>
    </form>
</div>

@endsection