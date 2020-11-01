@extends('layouts.app')

@section('content')

<div class="card-header">
    Coaches
</div>

<div class="card-body">

    <div class="row p-2 d-flex justify-content-between align-items-end">
        <form method="GET" action="{{route('coaches.index')}}" class="d-flex justify-content-around align-items-end">
            @csrf
            <div>
                <label class="form-text text-muted">Buscar</label>
                <input class="form-control" type="text" name="query" id="">
            </div>

            <div class="ml-1">
                <button class="btn btn-primary btn-square btn-sm">
                    <img src="{{ asset('img/icons/search.svg')}}" class="icon-white" alt="search">
                </button>
            </div>
        </form>
        <div class="mt-1">
            <a href="{{route('coaches.create')}}">
                <button class="btn btn-primary">
                    <img src="{{ asset('img/icons/add_circle.svg')}}" class="icon-white" alt="search">
                    Agregar
                </button>
            </a>
        </div>
    </div>
    <div class="row p-2 d-flex justify-content-center">
        <x-coaches.table :coaches="$coaches" />
    </div>

</div>

@endsection