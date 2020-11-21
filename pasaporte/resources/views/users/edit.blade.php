@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Edit') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('users.update', $user)}}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid error-input @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="carrera_id" class="col-md-4 col-form-label text-md-right">{{ __('Career') }}
            </label>
            <div class="col-md-6">
                <select id="carrera_id" type="text" class="custom-select @error('carrera_id') is-invalid error-input @enderror" name="carrera_id" value="{{ $user->carrera_id }}" required autocomplete="carrera_id" autofocus>
                    @foreach($carreras as $carrera)
                    <option value="{{$carrera->id}}" {{ $user->carrera_id == $carrera->id ? 'selected' : '' }}>{{$carrera->carrera_nombre}}</option>
                    @endforeach
                </select>
                @error('carrera_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="semestre" class="col-md-4 col-form-label text-md-right">{{ __('Semester') }}
            </label>
            <div class="col-md-6">
                <select id="semestre" type="text" class="custom-select @error('semestre') is-invalid error-input @enderror" name="semestre" value="{{ $user->semestre }}" required autocomplete="semestre" autofocus>
                    <option value="1" {{ $user->semestre == 1 ? 'selected' : '' }}>1°</option>
                    <option value="2" {{ $user->semestre == 2 ? 'selected' : '' }}>2°</option>
                    <option value="3" {{ $user->semestre == 3 ? 'selected' : '' }}>3°</option>
                    <option value="4" {{ $user->semestre == 4 ? 'selected' : '' }}>4°</option>
                    <option value="5" {{ $user->semestre == 5 ? 'selected' : '' }}>5°</option>
                    <option value="6" {{ $user->semestre == 6 ? 'selected' : '' }}>6°</option>
                    <option value="7" {{ $user->semestre == 7 ? 'selected' : '' }}>7°</option>
                    <option value="8" {{ $user->semestre == 8 ? 'selected' : '' }}>8°</option>
                    <option value="9" {{ $user->semestre == 9 ? 'selected' : '' }}>9°</option>
                </select>
                @error('semestre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
            <div class="col-md-6">
                <input type="radio" id="student" name="role" value="student" required>
                <label for="student">Alumno</label><br>
                <input type="radio" id="admin" name="role" value="admin" required>
                <label for="admin">Administrador</label><br>
                @error('role')
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