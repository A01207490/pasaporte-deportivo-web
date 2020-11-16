@extends('layouts.app')

@section('content')

<div class="card m-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            {{ __('Email') }}: {{$user->email}}
        </li>
        <li class="list-group-item">
            {{ __('Semester') }}: {{$user->semestre . '°'}}
        </li>
        <li class="list-group-item">
            {{ __('Career') }}: {{$user->carrera->carrera_nombre}}
        </li>

    </ul>
    <div class="card-body">
        <a href="{{route('users.index')}}" class="card-link">
            <button class="btn btn-primary">
                {{ __('Go Back') }}
            </button>
        </a>
    </div>
</div>


@endsection