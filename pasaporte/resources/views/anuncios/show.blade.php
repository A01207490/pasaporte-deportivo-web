@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="card w-100" style="width: 18rem;">
        <img class="card-img-top imgfit-lg" src="{{asset('storage/anuncios/'. $anuncio->id .'.png')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$anuncio->anuncio_titulo}}</h5>
            <p class="card-text">
                {{$anuncio->anuncio_cuerpo}}
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                {{ __('Registered') }}: {{ \Carbon\Carbon::parse($anuncio->created_at)->format('j-M-y')}}
            </li>
            <li class="list-group-item">
                {{ __('Updated') }}: {{ \Carbon\Carbon::parse($anuncio->updated_at)->format('j-M-y')}}
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
</div>
@endsection