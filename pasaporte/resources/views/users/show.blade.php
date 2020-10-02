@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$user->name}}
</div>

<div class="card-body">

    <ul class="list-group list-group-flush">

        <li class="list-group-item">
            <label>
                Correo: <b>{{$user->email}}</b>
            </label>
        </li>
        <li class="list-group-item">
            <label>
                Semestre: <b> {{$user->semestre . '°'}}</b>
            </label>
        </li>
        <li class="list-group-item">
            <label>
                Carrera: <b> {{$user->carrera->carrera_nombre}}</b>
            </label>
        </li>
        <li class="list-group-item">
            <a href="{{route('users.index')}}" class="card-link">
                <button class="btn btn-primary">
                    Regresar
                </button>
            </a>
        </li>
    </ul>
</div>

@endsection