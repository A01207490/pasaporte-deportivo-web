@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$user->name}}
</div>

<div class="card-body">
    <div class="row p-2 d-flex justify-content-end align-items-center">

        <a href="{{route('sesions.index')}}">
            <button class="btn btn-primary">
                Regresar
            </button>
        </a>


    </div>
    <div class="row p-2 d-flex justify-content-center">
        <x-sesions.table_details :sesions="$sesions" />
    </div>
</div>

@endsection