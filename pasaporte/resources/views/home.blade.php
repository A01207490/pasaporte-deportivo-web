@extends('layouts.app')

@section('content')
<div class="card-header">
    Inicio
</div>
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    {{ __('Bienvenido!') }}
    <!-- Change the colour #f8fafc to match the previous section colour -->

</div>

@endsection