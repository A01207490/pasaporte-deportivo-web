@extends("layout")
@section("content")
<div class="container">
    <div class="row p-2 d-flex justify-content-center">
        <div class="col">
            <x-tabla_coaches :coaches="$coaches" />
        </div>
    </div>
</div>
@endsection