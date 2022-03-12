@extends('layouts.app')    
@section('content')
<article class = "Producto-contenido mt-1">

    <h1 class = "text-center mb-4">{{$producto->nombre}}</h1>

    <div class ="Producto-QR card">
        <!-- colocar imagen de QR -->
        <h2>Imagen va aqui</h2>
    </div>
    <div class = "Producto-cuerpo card-body" >
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
                <a class = "btn btn-secondary botonsito" href="{{route('historialentrada.show',$producto->id)}}">Añadir Cantidad</a>
                <a class = "btn btn-secondary botonsito" href="{{route('historialsalida.show',$producto->id)}}">Venta del producto</a>
                <a class = "btn btn-secondary botonsito" href="{{route('Producto.index')}}">Volver</a>
            </div>
        </div>      
       
    </div>

</article>


@endsection