<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">@sortablelink('name', 'Nombre')</th>
            <th scope="col">@sortablelink('email', 'Correo')</th>
            <th scope="col">@sortablelink('carrera_id', 'Carrera')</th>
            <th scope="col">@sortablelink('semestre', 'Semestre')</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td data-col-title="Nombre">{{ $user->name }}</td>
            <td data-col-title="Correo">{{ $user->email }}</td>
            <td data-col-title="Carrera">{{ $user->carrera_nombre }}</td>
            <td data-col-title="Semestre">{{ $user->semestre . '°' }}</td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="{{route('users.show', $user)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/visibility.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>

                <a href="{{route('users.confirm', $user)}}" class="p-1">
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
    {!! $users->appends(\Request::except('page'))->render() !!}
</div>