@extends("layout")
@section("content")

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
        <div class="card  w-100">
            <div class="d-flex justify-content-center align-items-center p-2 border-bottom">
                <div class="">
                    <h4 class="card-title font-weight-bold">
                        {{$coach->coach_nombre}}
                    </h4>
                </div>
            </div>

            <div class="d-flex justify-content-around align-items-center p-2 border-bottom">


                <div class="p-2">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label class="font-weight-bold">
                                Nómina:
                            </label>
                            {{$coach->coach_nomina}}
                        </li>
                        <li class="list-group-item">
                            <label class="font-weight-bold">
                                Correo:
                            </label>
                            {{$coach->coach_correo}}
                        </li>
                    </ul>
                </div>

                <div class="border border-grey-lighten-1 rounded p-3">
                    {!! QrCode::generate($coach->coach_nomina); !!}
                </div>
            </div>

            <div class="p-2 d-flex justify-content-around align-items-center">
                <a href="{{route('coaches.index')}}" class="card-link">
                    <button class="btn btn-primary">
                        Regresar
                    </button>
                </a>
                <a href="{{route('qr.download', $coach)}}" class="card-link">
                    <button class="btn btn-primary">
                        Descargar
                    </button>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection