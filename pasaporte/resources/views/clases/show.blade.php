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
            {{ \Carbon\Carbon::parse($clase->clase_hora_inicio)->format('h:m')}}
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                Hora de finalización:
            </label>
            {{ \Carbon\Carbon::parse($clase->clase_hora_fin)->format('h:m')}}

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