<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rowdies:wght@400;700&display=swap">

</head>

<body style="background-color:#ffffff ">
<div class="container">
    <div class="row align-items-center">
        <div class="col-auto">
            <a class="btn mx-2" href="{{ route('home') }}" style="background-color: transparent; font-size: 50px; color: #413f3d"><-</a>
        </div>
        <div class="col">
            <h2 style="display: inline;">Detalles de Dirección:</h2>
        </div>
    </div>
</div>

<div class="container">

    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Datos Personales</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nombre:</strong> {{ $direccion->nombre }}</li>
                <li class="list-group-item"><strong>Apellidos:</strong> {{ $direccion->apellidos }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Datos de Dirección</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>País:</strong> {{ $direccion->pais }}</li>
                <li class="list-group-item"><strong>Provincia:</strong> {{ $direccion->provincia }}</li>
                <li class="list-group-item"><strong>Municipio:</strong> {{ $direccion->municipio }}</li>
                <li class="list-group-item"><strong>Código Postal:</strong> {{ $direccion->codigoPostal }}</li>
                <li class="list-group-item"><strong>Calle:</strong> {{ $direccion->calle }}</li>
                <li class="list-group-item"><strong>Número:</strong> {{ $direccion->numero }}</li>
                <li class="list-group-item"><strong>Portal:</strong> {{ $direccion->portal }}</li>
                <li class="list-group-item"><strong>Piso:</strong> {{ $direccion->piso }}</li>
                <li class="list-group-item"><strong>Información Adicional:</strong> {{ $direccion->infoAdicional }}</li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>
