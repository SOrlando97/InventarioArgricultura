@extends('layouts.app')    
@section('content')

<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($user as $user)      
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->rol->descripcion}}</td>
                <td>
                    <a class = "btn btn-primary botonsito" href="{{route('usuario.show',$user->id)}}">Ver Productos</a>
                    <contra-cuenta usuario-actual = {{$user->id}}></contra-cuenta>
                    <elim-cuenta usuario-actual = {{$user->id}}></elim-cuenta>
                </td>
            </tr>
            @endforeach            
        </tbody>           
    </table>
</div>

@endsection