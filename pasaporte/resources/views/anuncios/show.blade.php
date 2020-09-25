@extends("layout")
@section("content")
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <h3>{{$anuncio->anuncio_titulo}}</h3>
</div>
<div class="row p-2 d-flex justify-content-between align-items-center">
    <p>{{$anuncio->anuncio_cuerpo}}</p>
</div>


@endsection