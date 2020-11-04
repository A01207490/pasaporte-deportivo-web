@extends('layouts.app')

@section('content')
<div class="card-header">
    {{ __('Classes') }}
</div>

<div class="card-body">
    {{ $table }}
</div>

@endsection