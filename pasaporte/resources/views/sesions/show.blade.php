@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$user->name}}
</div>
<div class="card-body">
    <div class="row p-2 d-flex justify-content-between align-items-center">
        <a class="pl-1" href="{{route('sesions.index')}}">
            <button class="btn btn-primary p-2">
                Regresar
            </button>
        </a>
        <a href="{{route('sesions.create', $user->id)}}">
            <button class="btn btn-primary">
                <img src="{{ asset('img/icons/add_circle.svg')}}" class="icon-white" alt="search">
                Agregar
            </button>
        </a>
    </div>
    <div class="row p-2 d-flex justify-content-center">
        <x-sesions.table_details :sesions="$sesions" :user="$user" />
    </div>
</div>
@endsection