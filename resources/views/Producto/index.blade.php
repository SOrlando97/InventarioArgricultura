@extends('layouts.app')    
@section('content')
<div style="text-align: center">
    <a class = "mt-5 btn btn-secondary btn-success botonsito"
     href="{{route('Producto.create')}}">Crear Producto</a>
     <a class = "mt-5 btn btn-secondary btn-light botonsito"
     href="{{route('Producto.catalogo',Auth::user()->id)}}">Descargar Catalogo</a>
</div>
<body>
    <div class ="col-md-10 mx-auto p-3">
    @if(count($productos) < 1)
        <h1>Este usuario aún no tiene productos</h1>
    @else   
    
    <div class="table-responsive">
        <table class="table  tabla1 table-hover">
            <thead>
                <tr>
                    <th>Codigo QR</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody id="idTabla">
                @foreach($productos as $producto)   
                <tr>
                    <td>
                        <img class= "imagenQR" src="../storage/{{$producto->QR}}" alt="imagen de {{$producto->nombre}}">
                    </td>
                </td>
                    <td class="text-capitalize">{{$producto->nombre}}</td>
                    <td>
                        <a class = "btn botonsito btn-success" href="{{route('Producto.show',$producto->id)}}">Ver</a>
                        <a class = "btn botonsito btn-warning " href="{{route('Producto.edit',$producto->id)}}">Modificar</a>
                        <elim_producto producto = {{$producto->id}}><elim_producto>
                    </td>
                </tr>
                @endforeach
            </tbody>      
        </table>
        <div class="d-flex justify-content-end">
            {!! $productos->links()!!}
        </div>
        
    </div>
    @endif 
</div>
</body>
@endsection
