@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if (Auth::user()->id_rol==2)
        <h1 class="text-center text-white">¡ Bienvenido {{ Auth::user()->name }} !</h1>
            <div class="row mt-5">
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="/images/perfil.jpg" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title text-center"> <strong>Tipos de productos</strong></h3>
                              <p class="text-center">En esta opción podrás encontrar todos los tipos de productos que has registrado en 
                                el sistema, además podrás modificarlos y eliminarlos.
                              </p>
                                <div style="text-align: center">
                                    <a class = "mt-5 btn btn-secondary btn-success botonsito"
                                    href="{{route('Tipo_producto.index')}}">Ver Productos</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="/images/perfil.jpg" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title text-center"><strong> Listado de usuarios </strong></h3>
                              <p class="text-center ">En este apartado encontrarás todos los usuarios que están registrados 
                                en el sistema, en el cual podrás ver sus productos, cambiar su contraseña y así mismo eliminarlos del sistema.
                              </p>
                                <div style="text-align: center">
                                    <a class = "mt-4 btn btn-secondary btn-success botonsito"
                                    href="{{route('Producto.create')}}">Crear Producto</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card"></div>
        @endif


        <div>
            @if (Auth::user()->id_rol==1)
            <h1 class="text-center text-white">¡ Bienvenido {{ Auth::user()->name }} !</h1>
            <div class="row mt-5">
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="/images/perfil.jpg" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title text-center"> <strong>Listado de productos</strong></h3>
                              <p class="text-center">En esta opción podrás encontrar todos los productos que has registrado en 
                                el sistema, además podrás descargar tus reportes de ventas e ingresos.
                              </p>
                                <div style="text-align: center">
                                    <a class = "mt-2 btn btn-secondary btn-success botonsito"
                                    href="{{route('Producto.index')}}">Ver Productos</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="/images/perfil.jpg" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title text-center"><strong> Crea un producto </strong></h3>
                              <p class="text-center mb-4">Empieza a registrar tus productos y saca provecho de las 
                                funciones que contiene el sistema.
                              </p>
                                <div style="text-align: center">
                                    <a class = "mt-5 btn btn-secondary btn-success botonsito"
                                    href="{{route('Producto.create')}}">Crear Producto</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            
              @if($cantidad)
              <div class="alert alert-light text-center text-black" role="alert">
                  <strong>El producto mas vendido es {{$prodmasvendido->nombre}} con {{$cantidad}} kg vendidos este mes</strong> 
              </div>
              <h3></h3>
              @else
              <div class="alert alert-light text-center text-black" role="alert">
                  <strong>Este mes no se ha vendido ningun producto este mes</strong> 
              </div>
              @endif
            
            @endif
        </div>
    </div>
</div>
@endsection
