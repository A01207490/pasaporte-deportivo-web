@extends('layouts.app')

@section('content')

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-8 d-flex flex-column justify-content-center align-items-center">
        <div class="card  w-100">
            <div class="card-body">
                <h4 class="card-title">
                    {{$clase->clase_nombre}}
                </h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label class="font-weight-bold">
                        Hora de inicio:
                    </label>
                    {{$clase->clase_hora_inicio}}
                </li>
                <li class="list-group-item">
                    <label class="font-weight-bold">
                        Hora de finalización:
                    </label>
                    {{$clase->clase_hora_fin}}
                </li>
                <li class="list-group-item">
                    <label class="font-weight-bold">
                        Coach:
                    </label>
                    {{$coach->coach_nombre}}
                </li>
                <li class="list-group-item">
                    @foreach($clase->dias as $dia)
                    <ul>
                        <li>
                            {{ $dia->dia_nombre }}
                        </li>
                    </ul>
                    @endforeach
                </li>


            </ul>
            <div class="card-body">
                <a href="{{route('clases.index')}}" class="card-link">
                    <button class="btn btn-primary">
                        Regresar
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection