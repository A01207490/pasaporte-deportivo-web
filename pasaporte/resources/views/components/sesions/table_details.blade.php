<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Clase</th>
            <th scope="col">Fecha registro</th>
            <th scope="col">Coach</th>
            <th scope="col">Hora inicio</th>
            <th scope="col">Hora fin</th>

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