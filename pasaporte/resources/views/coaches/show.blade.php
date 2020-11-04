@extends('layouts.app')

@section('content')
<div class="card-header">
    {{$coach->coach_nombre}}
</div>

<div class="card-body">


    <div class="row p-2">
        <div class="col-12 col-sm-8 d-flex align-items-center">
            <ul class="list-group list-group-flush w-100">
                <li class="list-group-item">
                    <label>
                        {{ __('Employee Number') }}
                    </label>
                    <h6 class="font-weight-bold">
                        {{$coach->coach_nomina}}
                    </h6>

                </li>
                <li class="list-group-item">
                    <label>
                        {{ __('Email') }}
                    </label>
                    <h6 class="font-weight-bold">
                        {{$coach->coach_correo}}
                    </h6>
                </li>


            </ul>
        </div>

        <div class="col-12 col-sm-4 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-between align-items-center ">

                <div class="border border-grey-lighten-1 rounded p-3">
                    {!! QrCode::generate($encrypted_coach_nomina); !!}
                </div>
                <a href="{{route('qr.download', $coach)}}" class="card-link pt-3 w-100">
                    <button class="btn btn-primary w-100">
                        {{ __('Download') }}
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row m-2 border-top">

        <a class="p-2" href="{{route('coaches.index')}}">
            <button class="btn btn-primary">
                {{ __('Go Back') }}
            </button>
        </a>



    </div>


</div>



@endsection