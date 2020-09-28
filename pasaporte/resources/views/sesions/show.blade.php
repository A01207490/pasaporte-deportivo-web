@extends("layout")
@section("content")

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-12 d-flex flex-column justify-content-center align-items-center">
        <div class="card  w-100 ">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">
                        {{$sesions[0]->user->name}}
                    </h4>
                    <a href="{{route('sesions.index')}}" class="card-link">
                        <button class="btn btn-primary">
                            Regresar
                        </button>
                    </a>
                </div>

            </div>
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
                        <td data-col-title="Clase">{{ $sesion->clase->clase_nombre }}</td>
                        <td data-col-title="Fecha registro">{{ $sesion->created_at }}</td>
                        <td data-col-title="Coach">{{ $sesion->clase->coach->coach_nombre }}</td>
                        <td data-col-title="Hora inicio">{{ $sesion->clase->clase_hora_inicio }}</td>
                        <td data-col-title="Hora fin">{{ $sesion->clase->clase_hora_fin }}</td>

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
        </div>
    </div>
</div>
@endsection