@extends('layouts.app')    
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('Usuarios.index')}}">Listado de usuarios</a></li>
          <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
      </nav>
    <div class="row">
    @foreach($productos as $productos)   
    <div class="col m-2">
        <a  href="{{route('Producto.show',$productos->id)}}">
            <div class="cardProducts">
                <div class="card-body">
                    <h5 class="card-title text-center text-capitalize text-dark">
                        <strong>{{$productos->nombre}}</strong>
                    </h5>
                    <div class="imgPro"></div>
                    <div class="">
                        <p class="d-flex align-items-center">
                            <a class = "btn botonsito btn-success" href="{{route('Producto.edit',$productos->id)}}">Modificar</a>
                            <elim_producto producto = {{$productos->id}}><elim_producto>
                        </p>    
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    </div>
</div>
@endsection