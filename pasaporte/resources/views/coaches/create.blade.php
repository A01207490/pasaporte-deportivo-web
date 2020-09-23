@extends("layout")
@section('head')
@endsection
@section("content")

<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <div class="bd-highlight">
        <h3>Agregar coach</h3>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center align-items-center">
    <form method="POST" action="/coaches">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input name="coach_nombre" type="text" class="form-control" requiered>
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input name="coach_correo" type="email" class="form-control" requiered>
        </div>
        <div class="form-group">
            <label>Nómina</label>
            <input name="coach_nomina" type="text" class="form-control" requiered>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Registrar
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar coach</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Desea guarda el registro especificado?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection