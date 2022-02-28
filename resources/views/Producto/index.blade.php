@extends('layouts.app')    
@section('content')
<div style="margin-left: 45%">
    <button class="btn btn-secondary botonsito">
    Crear Producto
    </button>
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
            <!-- hacer for each -->      
            <tr>
                <td>prueba</td>
                <td>prueba</td>
                <td>prueba</td>
            </tr>
            
        </tbody>           
    </table>
</div>

@endsection