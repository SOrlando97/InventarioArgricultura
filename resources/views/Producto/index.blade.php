@extends('layouts.app')    
@section('content')
<div style="text-align: center">
    <a class = "btn btn-secondary botonsito" href="{{route('Producto.create')}}">Crear Producto</a>
</div>

<body style=" background-color: slateblue;">
<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($productos as $productos)   
            <tr>
                <td>{{$productos->nombre}}</td>
                <td>
                    <a class = "btn botonsito btn-success" href="{{route('Producto.show',$productos->id)}}">Ver</a>
                    <a class = "btn botonsito btn-warning" href="{{route('Producto.edit',$productos->id)}}">Modificar</a>
                    <elim_producto producto = {{$productos->id}}><elim_producto>
                    
                </td>
            </tr>
            @endforeach
        </tbody>           
    </table>
</div>
</body>
@endsection