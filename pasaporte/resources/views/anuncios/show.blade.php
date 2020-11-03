@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$anuncio->anuncio_titulo}}
</div>
<div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <p class="card-text">
                <label class="font-weight-bold">
                    {{ __('Registered') }}:

                </label>
                {{ \Carbon\Carbon::parse($anuncio->created_at)->format('j-M-y')}}
            </p>
        </li>
        <li class="list-group-item">
            <p class="card-text">
                <label class="font-weight-bold">
                    {{ __('Updated') }}:

                </label>
                {{ \Carbon\Carbon::parse($anuncio->updated_at)->format('j-M-y')}}
            </p>
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                {{ __('Body') }}:
            </label>
            <p class="card-text">
                {{$anuncio->anuncio_cuerpo}}
            </p>
        </li>
    </ul>
    <div class="card-body">
        <a href="{{route('anuncios.index')}}" class="card-link">
            <button class="btn btn-primary">
                {{ __('Go Back') }}
            </button>
        </a>
    </div>
</div>

@endsection