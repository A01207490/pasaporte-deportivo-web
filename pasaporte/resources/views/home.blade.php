@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section class="features-icons bg-secondary text-center text-white">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-lg-4">

                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3 p-2" src="img/logo.png" alt="">
                    <h1>Pasaporte Deportivo</h1>
                    <p class="lead mb-0">!Entrena a tu tiempo y a tu ritmo!</p>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-0.jpg');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Registra tu cuenta</h2>
                <p class="lead mb-0">Crea una cuenta con tu correo institucional del Tec para inscribirte en el programa.</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Descarga la App</h2>
                <p class="lead mb-0">Descarga la App para que puedas comenzar a registrar tus sesiones.</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Requisitos</h2>
                <p class="lead mb-0">
                    Cumplir 30 sesiones de 30 minutos como mínimo.
                </p>
                <p class="lead mb-0">
                    Realizar las pruebas físicas al menos una vez.
                </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Beneficios</h2>
                <p class="lead mb-0">
                    Participar en clases o clínicas deportivas que desees.
                </p>
                <p class="lead mb-0">
                    Cuenta para tu registro de actividades extracurriculares.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection