@extends("layout")
@section('head')
@endsection
@section("content")
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <div class="alert alert-warning" role="alert">
        ¿Está seguro de borrar el registro?
    </div>
</div>
<div class="row p-2d-flex justify-content-center align-items-center">
    <a href="{{route('clases.index')}}">
        <button class="btn btn-primary">
            Aceptar
        </button>
    </a>
</div>
@endsection