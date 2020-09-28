@extends("layout")
@section("content")

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-5 d-flex flex-column justify-content-center align-items-center">

        <div class="card w-100 ">

            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex flex-column justify-content-center align-items-center">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label>
                                Nombre
                            </label>
                            <h6 class="font-weight-bold">
                                {{$coach->coach_nombre}}

                            </h6>
                        </li>
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
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-center ">
                        <a class="card-link d-flex justify-content-start align-items-center pl-1  w-100">
                            <label>
                                Código QR
                            </label>
                        </a>

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

            <div class="card-body d-flex justify-content-start align-items-center border-top">
                <a href="{{route('coaches.index')}}" class="card-link">
                    <button class="btn btn-primary">
                        Regresar
                    </button>
                </a>
            </div>
        </div>

    </div>
</div>
</div>
@endsection