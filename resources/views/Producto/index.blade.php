@extends('layouts.app')    
@section('content')
<div style="text-align: center">
    <a class = "mt-5 btn btn-secondary btn-success botonsito"
     href="{{route('Producto.create')}}">Crear Producto</a>
</div>
<body>
    <div class ="col-md-10 mx-auto p-3">
    @if(count($productos) < 1)
        <h1>Este usuario aún no tiene productos</h1>
    @else    
        <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>Codigo QR</th>
                <th>Producto</th>
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
                <td class="text-capitalize">{{$productos->nombre}}</td>
                <td>
                    <a class = "btn botonsito btn-success" href="{{route('Producto.show',$productos->id)}}">Ver</a>
                    <a class = "btn botonsito btn-warning " href="{{route('Producto.edit',$productos->id)}}">Modificar</a>
                    <elim_producto producto = {{$productos->id}}><elim_producto>
                </td>
            </tr>
            @endforeach
        </tbody>           
    </table>
    @endif 
</div>
</body>
@endsection
