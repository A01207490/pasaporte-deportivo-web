@extends('layouts.app')

@section('content')

<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        {{ __('Coaches') }}
        <a href="{{route('coaches.confirmDestroyAll')}}" title=" {{ __('Destroy all') }}">
            <button type="button" class="btn btn-red-destroy btn-circle btn-sm">
                <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
            </button>
        </a>
    </div>
</div>

<div class="card-body">
    {{ $table }}
</div>

@endsection