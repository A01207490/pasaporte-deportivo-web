@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$user->name}}
</div>

<div class="card-body">
    <div class="row p-2 d-flex justify-content-between align-items-center">
        <form method="GET" action="/clases" class="d-flex justify-content-around align-items-center">
            @csrf
            <div>
                <input class="form-control" type="text" name="query" id="">
            </div>
            <div class="pl-1">
                <button class="btn btn-primary btn-square btn-sm">
                    <img src="{{ asset('img/icons/search.svg')}}" class="icon-white" alt="search">
                </button>
            </div>
        </form>
        <div>
            <a href="{{route('sesions.create', $user->id)}}">
                <button class="btn btn-primary">
                    <img src="{{ asset('img/icons/add_circle.svg')}}" class="icon-white" alt="search">
                    Agregar
                </button>
            </a>
        </div>
        <a href="{{route('sesions.index')}}">
            <button class="btn btn-primary">
                Regresar
            </button>
        </a>

    </div>

    <div class="row p-2 d-flex justify-content-end align-items-center">

    </div>
    <div class="row p-2 d-flex justify-content-center">
        <x-sesions.table_details :sesions="$sesions" :user="$user" />
    </div>
</div>

@endsection