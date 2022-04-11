@extends('layouts.app')    
@section('content')
<article class = "Producto-contenido mt-1 text-center">

    <h1 class = "text-center mb-4">{{$producto->nombre}}</h1>

    <div class="Producto-QR center-text">
        <!-- colocar imagen de QR -->
            <img class= "imagenQR" src="{{$producto->QR}}" alt="imagen de {{$producto->nombre}}">
                 
    </div>
    <a href="{{$producto->QR}}" download="{{$producto->nombre}} QR" style="color: yellow">
            Descargar Imagen SVG
            </a>   
    <div class = "Producto-cuerpo card-body d-flex justify-content-center" >
        <div>
            <div class="Producto-cuerpo-div">
                <ul>Cantidad: {{$producto->cantidad}} Kg</ul>
            </div>
            <div class="Producto-cuerpo-div">
                <ul>Precio: {{$producto->precio}}</ul>
            </div>
            <div class="Producto-cuerpo-div">
                <ul>Ganancia: {{$producto->ganancia}}</ul>
            </div>
            <div class="Producto-cuerpo-div">
                <ul>Tipo de Producto: {{$producto->tipoproducto->descripcion}}</ul>
            </div>
            
            <div class="Producto-cuerpo-div">
                <ul>Propietario: {{$producto->usuario->name}}</ul>
            </div>
            <div>
                @csrf
                @guest
                    @else
                        @if (Auth::user()->id === $producto->id_usuario)
                        <a class = "btn btn-secondary botonsito" href="{{route('historialentrada.index',$producto->id)}}">Añadir Cantidad</a>
                        <a class = "btn btn-secondary botonsito" href="{{route('historialsalida.index',$producto->id)}}">Venta del producto</a>
                        @endif
                @endguest
                <a class = "btn btn-secondary botonsito" href="{{route('Producto.index')}}">Volver</a>
            </div>
        </div>      
       
    </div>

</article>


@endsection