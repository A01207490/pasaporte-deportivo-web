@extends("layout")
@section("content")
<div class="container">
    <div class="row p-2 d-flex justify-content-start align-items-end">
        <div class="mr-2 bd-highlight">
            <h3>Catálogo de Coaches</h3>
        </div>
        <div class="p-2 bd-highlight">
            <button class="btn btn-primary">Agregar</button>
        </div>
    </div>
    <div class="row p-2 d-flex justify-content-start align-items-center">
        <div class="bd-highlight">
            <input class="form-control" type="text" name="" id="">
        </div>
        <div class="bd-highlight">
            <button class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.08333 11.6667H7.74167L7.975 11.4417C7.15833 10.4917 6.66667 9.25833 6.66667 7.91667C6.66667 4.925 9.09167 2.5 12.0833 2.5C15.075 2.5 17.5 4.925 17.5 7.91667C17.5 10.9083 15.075 13.3333 12.0833 13.3333C10.7417 13.3333 9.50833 12.8417 8.55833 12.025L8.33333 12.2583V12.9167L4.16667 17.075L2.925 15.8333L7.08333 11.6667ZM12.0833 11.6667C14.1583 11.6667 15.8333 9.99167 15.8333 7.91667C15.8333 5.84167 14.1583 4.16667 12.0833 4.16667C10.0083 4.16667 8.33333 5.84167 8.33333 7.91667C8.33333 9.99167 10.0083 11.6667 12.0833 11.6667Z" fill="white" />
                </svg>
            </button>
        </div>
    </div>

    <div class="row p-2 d-flex justify-content-center">
        <x-tabla_coaches :coaches="$coaches" />
    </div>
</div>
@endsection