@extends('layouts.app')

@section('content')

<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        {{$user->name}}
        <a href="{{route('sesions.index')}}" title=" {{ __('Go Back') }}">
            <button type="button" class="btn btn-primary btn-circle btn-sm">
                <img src="{{ asset('img/icons/arrow_back.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
            </button>
        </a>
    </div>
</div>

<div class="card-body">
    {{$table}}
</div>
@endsection