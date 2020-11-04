@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Coaches') }}
</div>

<div class="card-body">
    {{ $table }}
</div>

@endsection