<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Clase</th>
            <th scope="col">Fecha registro</th>
            <th scope="col">Coach</th>
            <th scope="col">Hora inicio</th>
            <th scope="col">Hora fin</th>
            <th scope="col">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @forelse($sesions as $sesion)
        <tr>
            <td data-col-title="Clase">{{ $sesion->clase_nombre }}</td>
            <td data-col-title="Fecha registro">{{ $sesion->created_at }}</td>
            <td data-col-title="Coach">{{ $sesion->coach_nombre }}</td>
            <td data-col-title="Hora inicio">{{ $sesion->clase_hora_inicio }}</td>
            <td data-col-title="Hora fin">{{ $sesion->clase_hora_fin }}</td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="{{route('sesions.confirm', $sesion)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>
            </td>
        </tr>
        <tr>
            @empty
            <td colspan="6" class="text-center" data-col-title="Nombre">No hay registros disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="card-body">
    <div class="d-flex justify-content-center">
        {{ $sesions->links() }}
    </div>
</div>