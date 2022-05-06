@extends('layouts.app')    
@section('content')
<div style="text-align: center">
    <a class = "mt-5 btn btn-secondary btn-success botonsito" href="{{route('Producto.create')}}">Crear Producto</a>
</div>

<body style=" background-color: slateblue;">
  
  {{-- @foreach($productos as $producto) 
  <div class="row">

  <div class="contenedor-card">
    <div class="row">
        <div class="col-8 card-text">
            <h2 class="text-center"> <strong> {{$producto->nombre}} </strong> </h2>
            <p> Cantidad: {{$producto->cantidad}} Kg</p>
            <p> Precio: {{$producto->precio}}</p>
            <p> Ganancia: {{$producto->ganancia}} </p>
            <p> Tipo de Producto: {{$producto->tipoproducto->descripcion}} </p>
            <p> Propietario: {{$producto->usuario->name}} </p>
        </div>

        <div class="col-4">

            <div class="card-producto">
                <img class= "imagenQR" src="{{$producto->QR}}" alt="imagen de {{$producto->nombre}}">
        
                <a class="card-text" href="{{$producto->QR}}" download="{{$producto->nombre}} QR">
                    Descargar Imagen SVG
                </a>   
            </div>
        </div>
    </div>
  </div>
</div>
@endforeach --}}


<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody id="idTabla">
            @foreach($productos as $productos)   
            <tr>
                <td>
                    <img class= "imagenQR" src="{{$productos->QR}}" alt="imagen de {{$productos->nombre}}">
                </td>
              </td>
                <td class="mitd">{{$productos->nombre}}</td>
                <td>
                    <a class = "btn botonsito btn-success" href="{{route('Producto.show',$productos->id)}}">Ver</a>
                    <a class = "btn botonsito btn-warning " href="{{route('Producto.edit',$productos->id)}}">Modificar</a>
                    <elim_producto producto = {{$productos->id}}><elim_producto>
                </td>
            </tr>
            @endforeach
        </tbody>           
    </table>
</div>
</body>
@endsection
