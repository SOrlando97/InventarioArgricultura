@extends('layouts.app')    
@section('content')

{{-- <article class = "Producto-contenido mt-1 text-center">

    <h1 class = "text-center mb-4">{{$producto->nombre}}</h1>

    <div class="Producto-QR center-text">
        <!-- colocar imagen de QR -->
            <img class= "imagenQR" src="{{$producto->QR}}" alt="imagen de {{$producto->nombre}}">
                 
    </div>
    <a href="{{$producto->QR}}" download="{{$producto->nombre}} QR" style="color: yellow">
            Descargar Imagen PNG
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

</article> --}}
<body >
    
<div class="container">
    <div class="row d-flex justify-content-center">
        @csrf        
        @if (Auth::user()->id === $producto->id_usuario)
        <a class = "btn btn-success botonsito" href="{{route('historialentrada.index',$producto->id)}}">Añadir Cantidad</a>
        <a class = "btn btn-warning botonsito" href="{{route('historialsalida.index',$producto->id)}}">Venta del producto</a>
        <a class = "btn btn-dark botonsito" href="{{route('Producto.index')}}">Volver</a>
        </div>
        <div class="contenedor-card">
            <div class="row">
                <div class="col card-text">
                    <h2 class="text-center text-capitalize text-dark"> <strong> {{$producto->nombre}} </strong> </h2>
                    <table class="table">
                        <thead >
                        <tr>
                            <th scope="col">Propietario</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-capitalize"> {{$producto->usuario->name}}</td>
                            <td>{{$producto->cantidad}} Kg</td>
                            <td>{{$producto->precio}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Precio Sugerido</th>
                            <th scope="col">Tipo de Producto</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$producto->ganancia}}</td>
                            <td>{{$producto->tipoproducto->descripcion}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <div class="card-producto">
                        
                        <img class= "imagenQR" src="../storage/{{$producto->QR}}" alt="imagen de {{$producto->nombre}}">
                        <a class="mt-5 card-text " href="../storage/{{$producto->QR}}" download="{{$producto->nombre}} QR">
                            Descargar Imagen PNG
                        </a>   
                    </div>
                </div>
                <div class="col">
                    @if($producto->imagen)
                        <img class= "imagenProd" src="/storage/{{ $producto->imagen }}" alt="imagen de {{$producto->nombre}}">
                        @else
                        <img class= "imagenProd" src="/images/perfil.jpg" alt="imagen de {{$producto->nombre}}">                                                  
                    @endif
                </div>
            </div>
        </div>
        @else
            <a class = "btn btn-dark botonsito" href="{{route('Producto.index')}}">Home</a>
            </div>
            <div class="contenedor-card">
                <div class="row">
                    <div class="col card-text">
                        <h2 class="text-center text-capitalize text-dark"> <strong> {{$producto->nombre}} </strong> </h2>
                        <table class="table">
                            <thead >
                            <tr>
                                <th scope="col">Propietario</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Telefono propietario</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-capitalize"> {{$producto->usuario->name}}</td>
                                <td>{{$producto->cantidad}} Kg</td>
                                @if($producto->usuario->Telefono)
                                <td>{{$producto->usuario->Telefono}}</td>
                                @else
                                <td>No hay registro</td>
                                
                                @endif
                            </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Correo de Contacto</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$producto->usuario->email}}</td>                            
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <div class="card-producto">
                            
                            <img class= "imagenQR" src="../storage/{{$producto->QR}}" alt="imagen de {{$producto->nombre}}">
                            <a class="mt-5 card-text " href="../storage/{{$producto->QR}}" download="{{$producto->nombre}} QR">
                                Descargar Imagen PNG
                            </a>   
                        </div>
                    </div>
                    <div class="col">
                        @if($producto->imagen)
                            <img class= "imagenProd" src="/storage/{{ $producto->imagen }}" alt="imagen de {{$producto->nombre}}">
                            @else
                            <img class= "imagenProd" src="/images/perfil.jpg" alt="imagen de {{$producto->nombre}}">                                                  
                        @endif
                    </div>
                </div>
            </div>
        @endif
        
    
</div>  
</body>

@endsection