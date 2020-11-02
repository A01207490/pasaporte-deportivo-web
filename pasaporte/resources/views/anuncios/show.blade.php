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
                    Fecha de creación:
                </label>
                {{ \Carbon\Carbon::parse($anuncio->created_at)->format('h:m')}}
            </p>
        </li>
        <li class="list-group-item">
            <p class="card-text">
                <label class="font-weight-bold">
                    Fecha de actualización:
                </label>
                {{ \Carbon\Carbon::parse($anuncio->updated_at)->format('h:m')}}
            </p>
        </li>
        <li class="list-group-item">
            <label class="font-weight-bold">
                Cuerpo:
            </label>
            <p class="card-text">
                {{$anuncio->anuncio_cuerpo}}
            </p>
        </li>
    </ul>
    <div class="card-body">
        <a href="{{route('anuncios.index')}}" class="card-link">
            <button class="btn btn-primary">
                Regresar
            </button>
        </a>
    </div>
</div>

@endsection