@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$coach->coach_nombre}}
</div>

<div class="card-body">


    <div class="row">
        <div class="col-12 col-sm-11 col-md-8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label>
                        Nómina
                    </label>
                    <h6 class="font-weight-bold">
                        {{$coach->coach_nomina}}
                    </h6>

                </li>
                <li class="list-group-item">
                    <label>
                        Correo
                    </label>
                    <h6 class="font-weight-bold">
                        {{$coach->coach_correo}}
                    </h6>
                </li>
                <li class="list-group-item">
                    <a href="{{route('coaches.index')}}">
                        <button class="btn btn-primary">
                            Regresar
                        </button>
                    </a>
                </li>

            </ul>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-between align-items-center ">

                <div class="border border-grey-lighten-1 rounded p-3">
                    {!! QrCode::generate($coach->coach_nomina); !!}
                </div>
                <a href="{{route('qr.download', $coach)}}" class="card-link pt-3 w-100">
                    <button class="btn btn-primary w-100">
                        Descargar
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">



    </div>


</div>



@endsection