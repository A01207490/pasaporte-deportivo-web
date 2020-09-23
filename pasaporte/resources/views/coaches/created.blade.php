@extends("layout")
@section('head')
@endsection
@section("content")
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <div class="alert alert-success" role="alert">
        ¡El registro fue exitoso!
    </div>
</div>
<div class="row p-2d-flex justify-content-center align-items-center">
    <a href="/coaches">
        <button class="btn btn-primary">
            Aceptar
        </button>
    </a>
</div>
@endsection