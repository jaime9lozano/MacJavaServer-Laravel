<?php
    use App\Models\DireccionPersonal;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    $user =Auth::user();
?>

@extends('main')
@section('title','Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Detalles de Usuario</h3>
                    <div class="card-text">
                        <div class="row " style="height: 300px">
                            <div class="col-md-6 align-items-center justify-content-between">
                                <strong>Nombre:</strong> {{ $user->name }}<br>
                                <strong>Email:</strong> {{ $user->email }}
                            </div>
                            <div class="col-md-6 align-items-center justify-content-between">
                                <div class="row mb-3">
                                    @if(Auth::user()->avatar !== User::$AVATAR_DEFAULT)
                                        <img alt="Imagen del usuario" src="{{ asset('storage/avatar/' . Auth::user()->avatar ) }}" class="img-fluid mx-auto" style="height: 150px; width: auto;">
                                    @else
                                        <img alt="Imagen por defecto" src="{{ asset(User::$AVATAR_DEFAULT) }}" class="img-fluid mx-auto" style="height: 150px; width: auto; background-color: #413f3d; color: white; padding: 1px; border-radius: 50%;">
                                    @endif
                                </div>

                                <form class="row" action="{{ route("users.updateImage", $user->id) }}" method="post" enctype="multipart/form-data" style="padding-left: 20px">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group d-flex justify-content-evenly">
                                        <label for="avatar" style="color: coral; font-weight: bold; margin-right: 20px">Nuevo avatar:</label>
                                        <input accept="image/*" class="form-control-file" id="avatar" name="avatar" required type="file">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="d-flex justify-content-end" >
                                        <button class="btn" type="submit" style="background-color: coral; color: white">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Pedidos</h3>
                @if($pedidos && count($pedidos)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="headerPedidos">
                                        <th>ID del Pedido</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pedidos as $pedido)
                                    <tr class="tr-hover">
                                        <td>{{ $pedido->id }}</td>
                                        <td>{{ $pedido->created_at }}</td>
                                        <td>${{ $pedido->precioTotal }}</td>
                                        <td>{{ $pedido->estado }}</td>
                                        <td>
                                            <a href="{{ route('pedido.details', $pedido->id) }}" class="btn btn-primary">Ver Pedido</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                @else
                        <div class="alert alert-info" role="alert">
                            No se encontraron pedidos
                        </div>
                @endif
                </div>

            </div>
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Direcciones</h3>
                    <div class="row">
                        @if( $direcciones && count($direcciones) > 0 )
                            @foreach($direcciones as $direccion)
                                <div class="card mt-4 col-md-4 mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title mb-2 text-center ">{{ $direccion->nombre }}</h5>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <a href="{{ route('direccion-personal.show', $direccion->id) }}" class=" btn btn-secondary" style="margin-right: 10px">Detalles</a>
                                            <a href="{{ route('direccion-personal.edit', $direccion->id) }}" class=" btn btn-primary" style="margin-right: 10px">Editar</a>
                                            <form action="{{ route('direccion-personal.destroy', $direccion->id) }}" method="POST" class="d-flex justify-content-center align-items-center m-0" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('¿Estás seguro de que deseas borrar esta direccion?')">Borrar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        No tienes pedidos todavia :)
                                    </div>
                                </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="pagination-container">
                                {{ $direcciones->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-right">
                                <a class="btn btn-primary" href="{{route('direccion-personal.create')}}">Nueva Dirección</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
