@extends('layouts.app')

@section('content')

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-8 d-flex flex-column justify-content-center align-items-center">

        <div class="card w-100">

            <div class="card-body">

                <h4 class="card-title">
                    {{$anuncio->anuncio_titulo}}
                </h4>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-text">
                        <label class="font-weight-bold">
                            Fecha de creación:
                        </label>
                        {{$anuncio->created_at}}
                    </p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">
                        <label class="font-weight-bold">
                            Fecha de actualización:
                        </label>
                        {{$anuncio->updated_at}}
                    </p>
                </li>
                <li class="list-group-item">

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
    </div>
</div>
@endsection