<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Alumno</th>
            <th scope="col">Clase</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($sesions as $sesion)
        <tr>
            <td data-col-title="Alumno">{{ $sesion->user->name }}</td>
            <td data-col-title="Clase">{{ $sesion->clase->clase_nombre }}</td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="{{route('sesions.show', $sesion)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/visibility.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>
                <a href="{{route('sesions.edit', $sesion)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>
                <a href="{{route('sesions.destroy', $sesion)}}" class="p-1">
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
    {{ $sesions->links() }}
</div>