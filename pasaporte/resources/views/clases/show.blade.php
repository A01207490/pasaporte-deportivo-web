@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$clase->clase_nombre}}
</div>
<div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <label class="font-weight-bold">
                {{ __('Start hour') }}:
            </label>
            {{ \Carbon\Carbon::parse($clase->clase_hora_inicio)->format('g:i A')}}
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                {{ __('End hour') }}:
            </label>
            {{ \Carbon\Carbon::parse($clase->clase_hora_fin)->format('g:i A')}}

        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                {{ __('Coach') }}:
            </label>
            {{$coach->coach_nombre}}
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                {{ __('Days') }}:
            </label>
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