@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$clase->clase_nombre}}
</div>
<div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <label class="font-weight-bold">
                Hora de inicio:
            </label>
            {{$clase->clase_hora_inicio}}
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                Hora de finalización:
            </label>
            {{$clase->clase_hora_fin}}
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                Coach:
            </label>
            {{$coach->coach_nombre}}
        </li>
        <li class="list-group-item">
            @foreach($clase->dias as $dia)
            <ul>
                <li>
                    {{ $dia->dia_nombre }}
                </li>
            </ul>
            @endforeach
        </li>
    </ul>
    <div class="card-body">
        <a href="{{route('clases.index')}}" class="card-link">
            <button class="btn btn-primary">
                Regresar
            </button>
        </a>
    </div>
</div>

@endsection