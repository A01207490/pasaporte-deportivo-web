<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Hora inicio</th>
            <th scope="col">Hora fin</th>
            <th scope="col">Días</th>
            <th scope="col">Coach</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($clases as $clase)
        <tr>
            <td data-col-title="Nombre">{{ $clase->clase_nombre }}</td>
            <td data-col-title="Hora inicio">{{ $clase["clase_hora_inicio"] }}</td>
            <td data-col-title="Hora fin">{{ $clase["clase_hora_fin"] }}</td>
            <td data-col-title="Días">
                @foreach($clase->dias as $dia)
                {{ $dia->dia_nombre }}
                @endforeach
            </td>
            <td data-col-title="Coach">{{ $clase->coach->coach_nombre }}</td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="{{route('clases.edit', $clase)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>

                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-circle btn-sm">
                    <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                </button>
            </td>
        </tr>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Desea borrar el registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                        <a href="{{route('clases.destroy', $clase)}}" class="p-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Aceptar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <tr>
            @empty
            <td colspan="6" class="text-center" data-col-title="Nombre">No hay registros disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $clases->links() }}
</div>