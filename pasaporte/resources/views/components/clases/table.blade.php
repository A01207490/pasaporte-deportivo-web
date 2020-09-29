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
                <a href="{{route('clases.show', $clase)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/visibility.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>
                <a href="{{route('clases.edit', $clase)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>
                <a href="{{route('clases.confirm', $clase)}}" class="p-1">
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
<div class="d-flex justify-content-center">
    {{ $clases->links() }}
</div>