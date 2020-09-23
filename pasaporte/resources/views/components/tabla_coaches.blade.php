<table class="table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Nómina</th>
            <th scope="col">Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coaches as $coach)
        <tr>
            <th scope="row">{{ $coach["coach_nombre"] }}</th>
            <td>{{ $coach["coach_nomina"] }}</td>
            <td>{{ $coach["coach_correo"] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $coaches->links() }}
</div>