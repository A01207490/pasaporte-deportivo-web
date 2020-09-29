@extends("layout")
@section("content")

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-8 d-flex flex-column justify-content-center align-items-center">
        <div class="card  w-100">
            <div class="card-body">
                <h4 class="card-title">
                    {{$user->name}}
                </h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label>
                        Correo
                    </label>
                    <h6 class="font-weight-bold">
                        {{$user->email}}
                    </h6>

                </li>
            </ul>
            <div class="card-body">
                <a href="{{route('users.index')}}" class="card-link">
                    <button class="btn btn-primary">
                        Regresar
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection