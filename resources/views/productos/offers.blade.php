@php use App\Models\Producto; @endphp
@extends('main')

@section('title', 'Ofertas')

@section('content')
    <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center">
            <form action="{{ route('productos.offers') }}" class="mb-3" method="get">
                @csrf
                <div class="group">
                    <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                    <input type="search" class="inputSearch" name="search" id="search" placeholder="Buscar...">
                </div>
            </form>
        </div>
        <div class="col-7">

        </div>
        <div class="col-2">
        </div>
    </div>

    <div class="row">
        @if ($productos !== null && count($productos) > 0)
            @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="card shadow shadow-lg" style="border-radius: 0 0 75px 75px; color: #413f3d; background: #ffffff; margin-bottom: 40px">
                        <div class="card-header" style="margin-top: -2px; margin-left: -1px; margin-right: -1px; text-align: center; background-color: coral; color: white; font-weight: bold; font-size: 30px;">{{ $producto->nombre }}</div>

                        <div class="card-body" style="padding: 10px">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                @if($producto->imagen != Producto::$IMAGE_DEFAULT)
                                    <img style="height: 300px; width: 300px"  alt="Imagen del producto" src="{{ asset('storage/' . $producto->imagen) }}">
                                @else
                                    <img style="height: 300px; width: 300px" alt="Imagen por defecto" src="{{ Producto::$IMAGE_DEFAULT }}"
                                         >
                                @endif
                            </div>
                            <div class="d-flex justify-content-lg-between align-items-center" style="padding: 0 10px">
                                <p style="margin: 0">{{ $producto->precio }}$</p>
                                <a class="btn" href="{{ route('productos.show', $producto->id) }}" style="color: white; background-color: #413f3d">Comprar</a>
                            </div>
                        </div>
                        @if($producto->oferta === true)
                            <div class="card-footer" style="margin-bottom: -1px; font-weight: bold; font-size: 25px; color: white; text-align: center; border-radius: 0 0 100px 100px; background: linear-gradient(to right, coral, #ff4d6b, coral)">OFERTA</div>
                        @else
                            <div class="card-footer" style="margin-bottom: -1px; font-weight: bold; font-size: 25px; color: rgb(255,179,150); text-align: center; border-radius: 0 0 50px 50px; background-color: #ffb396">PRODUCTO</div>
                        @endif
                    </div>
                </div>
            @endforeach

        @else
            <p class='lead'><em>No se ha encontrado datos de funkos.</em></p>
        @endif
    </div>
    <div class="pagination-container">
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>

@endsection
