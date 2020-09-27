@extends("layout")
@section("content")

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-8 d-flex flex-column justify-content-center align-items-center">
        <div class="card  w-100">
            <div class="card-body">
                <h4 class="card-title">
                    {{$coach->coach_nombre}}
                </h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label class="font-weight-bold">
                        Nómina:
                    </label>
                    {{$coach->coach_nomina}}

                    {!! QrCode::generate({{$coach->coach_nomina}}); !!}

                </li>
                <li class="list-group-item">
                    <label class="font-weight-bold">
                        Correo:
                    </label>
                    {{$coach->coach_correo}}
                </li>
            </ul>
            <div class="card-body">
                <a href="{{route('coaches.index')}}" class="card-link">
                    <button class="btn btn-primary">
                        Regresar
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection