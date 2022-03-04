@extends('layouts.app')    
@section('content')

<article class = "Producto-contenido mt-4">

    <h1 class = "text-center mb-4">{{$producto->nombre}}</h1>

    <div class ="Producto-QR">
        <!-- colocar imagen de QR -->
        <h2>Imagen va aqui</h2>
    </div>
    <div class = "Producto-cuerpo" >
        <div>
            <h2>Cantidad</h2>
        </div>
        <div>
            <h2>Precio</h2>
        </div>
        <div>
            <h2>Ganancia</h2>
        </div>
        <div>
            <h2>Tipo de producto</h2>
        </div>
        <div>
            <h2>Usuario</h2>
        </div>
        <div>
            <h2>Botones</h2>
        </div>
    </div>

</article>


@endsection