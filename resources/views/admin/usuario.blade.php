@extends('layouts.app')    
@section('content')

<div class="container ">
    <h2 class="text-center"><strong>Listado de usuarios </strong></h2>
  <div class="card-group  row-cols-1 row-cols-md-2 g-4">
        @foreach($user as $usuario)      
        <div class="col">
            <div class="cardP m-3" >
              <div class="row">
                <div class="col-4">
                    <div class="imgUser img-fluid rounded-start "> </div>
                </div>
                <div class="col">
                    <div class="p-1">
                        <strong>Nombre:</strong> {{$usuario->name}}
                        <p class="text-dark "><strong> Rol: </strong>{{$usuario->rol->descripcion}}</p>
                    <p class="card-text">
                        <a class = "btn btn-dark botonsito"
                         href="{{route('usuario.show',$usuario->id)}}">Ver Productos
                        </a>
                            <contra-cuenta usuario-actual = {{$usuario->id}}></contra-cuenta>
                            <elim-cuenta usuario-actual = {{$usuario->id}}></elim-cuenta>
                    </p>
                        
                    </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
            {!! $user->links()!!}
    </div>   
</div>

@endsection