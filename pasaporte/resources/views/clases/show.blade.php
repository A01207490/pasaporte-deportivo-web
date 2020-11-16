@extends('layouts.app')

@section('content')
<div class="card m-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{$clase->clase_nombre}}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            {{ __('Coach') }}: {{$coach->coach_nombre}}
        </li>
        <li class="list-group-item">
            {{ __('Days') }}: {{ implode(', ', $clase->dias()->get()->pluck('dia_nombre')->toArray()) }}
        </li>
        <li class="list-group-item">
            {{ __('Start hour') }}: {{ \Carbon\Carbon::parse($clase->clase_hora_inicio)->format('g:i A')}}
        </li>
        <li class="list-group-item">
            {{ __('End hour') }}: {{ \Carbon\Carbon::parse($clase->clase_hora_fin)->format('g:i A')}}
        </li>
    </ul>
    <div class="card-body">
        <a href="{{route('clases.index')}}" class="card-link">
            <button class="btn btn-primary">
                {{ __('Go Back') }}
            </button>
        </a>
    </div>
</div>

@endsection