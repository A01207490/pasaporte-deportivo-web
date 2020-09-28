@extends("layout")
@section("content")
<div class="row p-2 mt-2 d-flex justify-content-center align-items-center">
    <h3>Pasaportes</h3>
</div>
<div class="row p-2 d-flex justify-content-between align-items-center">
    <form method="GET" action="{{route('sesions.index')}}" class="d-flex justify-content-around align-items-center">
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
    <div>
        <a href="{{route('pasaportes.export')}}">
            <button class="btn btn-primary">
                <img src="{{ asset('img/icons/download.svg')}}" height="15" class="icon-white" alt="search">
                Descargar
            </button>
        </a>
    </div>
</div>
<div class="row p-2 d-flex justify-content-center">
    <x-sesions.table :sesions="$sesions" />
</div>

@endsection