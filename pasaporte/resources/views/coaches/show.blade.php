@extends('layouts.app')

@section('content')
<div class="card m-2" style="width: 18rem;">
    <img class="card-img-top qrcode p-2" src="{{asset('storage/qr_codes/'. $coach->coach_nomina .'.svg')}}" alt="{{ __('Please generate the QR code.') }}">
    <div class="card-body">
        <h5 class="card-title">{{$coach->coach_nombre}}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            {{ __('Employee Number') }}: {{$coach->coach_nomina}}
        </li>
        <li class="list-group-item">
            {{ __('Email') }}: {{$coach->coach_correo}}
        </li>
    </ul>
    <div class="card-body d-flex justify-content-between">
        <a href="{{route('coaches.index')}}" class="card-link">
            <button class="btn btn-primary">
                {{ __('Go Back') }}
            </button>
        </a>
        <a href="{{route('qr.download', $coach)}}" class="card-link">
            <button class="btn btn-primary">
                {{ __('Download') }}
            </button>
        </a>
    </div>

</div>
@endsection