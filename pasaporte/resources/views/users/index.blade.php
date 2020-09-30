@extends("layout")
@section("content")
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <h3>Alumnos</h3>
</div>
<div class="row p-2 d-flex justify-content-between align-items-center">
    <form method="GET" action="{{route('users.index')}}" class="d-flex justify-content-around align-items-end">
        @csrf
        <div>
            <input class="form-control" type="text" name="query" id="">
        </div>
        <div class="pl-1">
            <button class="btn btn-primary btn-square btn-sm">
                <img src="{{ asset('img/icons/search.svg')}}" class="icon-white" alt="search">
            </button>
        </div>


    </form>
    <!--
    <div class="">

        <select name='carrera_id' class="custom-select">
            @foreach($carreras as $carrera)
            <option value="{{$carrera->id}}">{{$carrera->carrera_nombre}}</option>
            @endforeach
        </select>
    </div>
    -->
    <div class="">
        <a href="{{route('users.create')}}">
            <button class="btn btn-primary">
                <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search">
                Borrar
            </button>
        </a>
        <a href="{{route('users.create')}}">
            <button class="btn btn-primary">
                <img src="{{ asset('img/icons/add_circle.svg')}}" class="icon-white" alt="search">
                Agregar
            </button>
        </a>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center">
    <x-users.table :users="$users" />
</div>

@endsection