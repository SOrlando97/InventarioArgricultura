@extends('layouts.app')    
@section('content')
<div style="margin-left: 45%">
<a class = "btn btn-secondary botonsito" href="{{route('Producto.create')}}">Crear Producto</a>
</div>

<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($productos as $productos)   
            <tr>
                <td>{{$productos->id}}</td>
                <td>{{$productos->nombre}}</td>
                <td>prueba</td>
            </tr>
            @endforeach

            
        </tbody>           
    </table>
</div>

@endsection