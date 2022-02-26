@extends('layouts.app')    
@section('content')

<div class ="col-md-10 mx-auto p-3">
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($user as $user)      
            <tr>
                <td>{{$user->name}}</td>
                <td>prueba</td>
                <td>prueba</td>
            </tr>
            @endforeach            
        </tbody>           
    </table>
</div>

@endsection