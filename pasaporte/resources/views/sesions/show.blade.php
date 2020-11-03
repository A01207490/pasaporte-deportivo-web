@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$user->name}}
</div>
<div class="card-body">
    <div class="row p-2 d-flex justify-content-end align-items-center">
        <a class="pl-1" href="{{route('sesions.index')}}">
            <button class="btn btn-primary p-2">
                Regresar
            </button>
        </a>
    </div>
    <div class="row p-2 d-flex justify-content-center">
        {{$table}}
    </div>
</div>
@endsection