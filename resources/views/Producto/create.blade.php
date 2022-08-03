@extends('layouts.app')    
@section('content')
<div class="container">
    <div class="alert alert-light d-flex justify-content-center" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-center">
                    <a class="text-dark" href="{{route('Producto.index')}}">
                        Listado de Productos
                    </a>
            </li>
                <li class="breadcrumb-item active text-decoration-underline text-dark" aria-current="page">
                    <strong>Crear Producto</strong>
                </li>
            </ol>
        </nav>
    </div>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-3 px-md-5 text-center text-lg-start my-5">
          <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
              <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
              <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
              <div class="card bg-glass">
                <div class="card-body px-4 py-5 px-md-5">
                    <form class="formsito" method="POST" enctype="multipart/form-data" action="{{ route('Producto.store') }}">
                        @csrf
                        <h4 style="text-align: center;"><strong>Crear producto</strong></h4>
                        <div class="row mb-3">
                            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                            <div class="col-md-12">
                                <input autocomplete="off" id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="precio" class="form-label">{{ __('Precio (kg)') }}</label>
                            <div class="col-md-12">
                                <input autocomplete="off" id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}">
                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="tipoproducto" class="form-label">{{ __('Tipo de producto') }}</label>
                            <div class="col-md-12">
                                <select name="tipoproducto" id="tipoproducto" class="form-control @error('tipoproducto') is-invalid @enderror">
                                    <option value="">--Seleccione--</option>
                                    @foreach($tipoproducto as $tipoproducto)
                                    <option value="{{$tipoproducto->id}}" {{ old('tipoproducto') == $tipoproducto->id ? 'selected': ''}}>{{$tipoproducto->descripcion}}</option>
                                    @endforeach
                                </select>
                                @error('tipoproducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="imagen">Elegir Imagen</label>
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class  ="btn btn-dark btn-ver" type="submit">
                                    {{ __('Añadir Producto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection