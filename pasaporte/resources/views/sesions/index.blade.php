@extends('layouts.app')

@section('content')
<div class="card-header">
    {{ __('Pasports') }}
</div>

<div class="card-body">
    <div class="row p-2 d-flex justify-content-end align-items-end">

        <div class="mt-1">
            <a href="{{route('pasaportes.export')}}">
                <button class="btn btn-primary">
                    <img src="{{ asset('img/icons/download.svg')}}" height="15" class="icon-white" alt="search">
                    {{ __('Download') }}
                </button>
            </a>
        </div>
    </div>
    <div class="row p-2 d-flex justify-content-center">
        {{ $table }}
    </div>
</div>
@endsection