<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td data-col-title="Nombre">{{ $user["name"] }}</td>
            <td data-col-title="Correo">{{ $user["email"] }}</td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="{{route('users.show', $user)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/visibility.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>
                <a href="{{route('users.edit', $user)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
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
    {{ $users->links() }}
</div>