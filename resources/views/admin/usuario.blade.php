@extends('layouts.app')    
@section('content')

<div class="container ">
    <h2 class="text-center"><strong>Listado de usuarios </strong></h2>
  <div class="card-group  row-cols-1 row-cols-md-2 g-4">
        @foreach($user as $user)      
        <div class="col">
            <div class="cardP mb-3" >
              <div class="row g-0">
                <div class="col-md-4">
                    <div class="imgUser img-fluid rounded-start "> </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <p class="card-text">
                        <a class = "btn btn-dark botonsito"
                         href="{{route('usuario.show',$user->id)}}">Ver Productos
                        </a>
                            <contra-cuenta usuario-actual = {{$user->id}}></contra-cuenta>
                            <elim-cuenta usuario-actual = {{$user->id}}></elim-cuenta>
                    </p>
                    <p class="  "><small class="text-muted text-decoration-underline">Nombre: {{$user->name}}</small></p>
                    <p class=""><small class="text-muted text-decoration-underline">Rol: {{$user->rol->descripcion}}</small></p>
                    </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>        
</div>

@endsection