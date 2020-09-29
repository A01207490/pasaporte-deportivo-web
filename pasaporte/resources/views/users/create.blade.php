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
        <h3>Agregar Usuario</h3>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{route('users.store')}}" class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
        @csrf
        <div class="form-group w-100">
            <label>Nombre</label>
            <input name="name" type="text" class="form-control @error('name') error-input @enderror" value="{{ old('name')}}" required>
            @error('name')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Correo</label>
            <input name="email" type="email" class="form-control @error('email') error-input @enderror" value="{{ old('email')}}" required>
            @error('email')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Contraseña</label>
            <input name="password" type="password" class="form-control @error('password') error-input @enderror" value="{{ old('password')}}" required>
            @error('password')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Carrera</label>
            <select name='carrera_id' class="custom-select">
                @foreach($carreras as $carrera)
                <option value="{{$carrera->id}}">{{$carrera->carrera_nombre}}</option>
                @endforeach
            </select>
            @error('carrera')
            <div class="alert alert-red p-1 mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group w-100">
            <label>Semestre</label>
            <select name='semestre' class="custom-select">
                <option value="1">1°</option>
                <option value="2">2°</option>
                <option value="3">3°</option>
                <option value="4">4°</option>
                <option value="5">5°</option>
                <option value="6">6°</option>
                <option value="7">7°</option>
                <option value="8">8°</option>
                <option value="9">9°</option>
            </select>
            @error('semestre')
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