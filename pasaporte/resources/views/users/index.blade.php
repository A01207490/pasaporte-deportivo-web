@extends('layouts.app')

@section('content')
<div class="card-header">
    {{ __('Students') }}
</div>

<div class="card-body">
    <div class="row p-2 d-flex justify-content-end align-items-end">

        <div class="mt-1">
            <a href="{{route('users.confirmDestroyAll')}}">
                <button class="btn btn-primary">
                    <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search">
                    {{ __('Delete') }}
                </button>
            </a>
        </div>

    </div>
    <div class="row p-2 d-flex justify-content-center">
        {{ $table }}
    </div>
</div>
@endsection