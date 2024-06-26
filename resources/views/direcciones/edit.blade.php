@php use App\Models\Direccion; @endphp

@extends('main')

@section('title', 'Editar Direccion')

@section('content')
    <a class="btn mx-2" href="{{ route('direcciones.show', $direccion->id) }}" style="background-color: transparent; font-size: 50px; color: #413f3d"><-</a>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
    @endif

    <form class="d-flex flex-column" action="{{ route("direcciones.update", $direccion->id) }}" method="post" style="border-top: 2px solid #413f3d; padding: 20px">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col d-flex flex-column" style="border-left: 2px solid coral">
                <h5>Actualiza la direccion</h5>
                <p>(*) Campo obligatorio</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="pais" class="form-control-sm">(*)Pais</label>
                <input class="form-control form-control-sm" id="pais" name="pais" type="text" required style="margin-bottom: 10px" value="{{$direccion->pais}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="provincia" class="form-control-sm">(*)Provincia</label>
                <input class="form-control form-control-sm" id="provincia" name="provincia" type="text" value="{{ $direccion->provincia }}" required style="margin-bottom: 10px">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="municipio" class="form-control-sm">(*)Municipio</label>
                <input class="form-control form-control-sm" id="municipio" name="municipio" type="text" required style="margin-bottom: 10px" value="{{$direccion->municipio}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="codigoPostal" class="form-control-sm">(*)Codigo Postal</label>
                <input class="form-control form-control-sm" id="codigoPostal" name="codigoPostal" type="text" value="{{ $direccion->codigoPostal }}" required style="margin-bottom: 10px">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="calle" class="form-control-sm">(*)Calle</label>
                <input class="form-control form-control-sm" id="calle" name="calle" type="text" required style="margin-bottom: 10px" value="{{$direccion->calle}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="numero" class="form-control-sm">(*)Numero</label>
                <input class="form-control form-control-sm" id="numero" name="numero" type="text" value="{{ $direccion->numero }}" required style="margin-bottom: 10px">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="portal" class="form-control-sm">(*)Portal</label>
                <input class="form-control form-control-sm" id="portal" name="portal" type="text" required style="margin-bottom: 10px" value="{{$direccion->portal}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="piso" class="form-control-sm">(*)Piso</label>
                <input class="form-control form-control-sm" id="piso" name="piso" type="text" value="{{ $direccion->piso }}" required style="margin-bottom: 10px">
            </div>
        </div>
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <label for="infoAdicional" class="form-control-sm">(*)Info Adicional</label>
                <input class="form-control form-control-sm" id="infoAdicional" name="infoAdicional" type="text" value="{{ $direccion->infoAdicional }}" required style="margin-bottom: 10px">
            </div>
        </div>
        <br>
        <div>
            <button class="btn" type="submit" style="background-color: coral; color: white">Actualizar</button>
        </div>
    </form>
@endsection
