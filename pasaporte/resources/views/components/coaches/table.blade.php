<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Nómina</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coaches as $coach)
        <tr>
            <td data-col-title="Nombre">{{ $coach["coach_nombre"] }}</td>
            <td data-col-title="Nómina">{{ $coach["coach_nomina"] }}</td>
            <td data-col-title="Correo">{{ $coach["coach_correo"] }}</td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="/coaches/{{$coach['coach_id']}}/edit" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>

                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-circle btn-sm">
                    <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                </button>

            </td>
        </tr>
        <x-delete_modal :coach="$coach" />
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $coaches->links() }}
</div>