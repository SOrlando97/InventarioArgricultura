@extends('layouts.app')    
@section('content')
<div style="margin-left: 45%">
<a class = "mt-5 btn btn-secondary botonsito" href="{{route('Usuarios.index')}}">Volver</a>
</div>

<div class ="mt-2 col-md-10 mx-auto p-3">
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

@endsection