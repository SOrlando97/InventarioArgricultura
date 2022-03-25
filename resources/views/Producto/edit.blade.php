@extends('layouts.app')    
@section('content')
<div style="margin-left: 15%">
<a class = "btn btn-secondary botonsito" href="{{route('Producto.index')}}">Volver</a>
</div>
<div class="container">
<div class="carta-inicio card " style="margin-top: 20px">
    <div class="card-header text-center">{{ __('Modificar Producto') }}</div>

    <div class="card-body">
        <form class="formsito" method="POST" action="{{ route('Producto.update',['producto' => $producto->id]) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input autocomplete="off" id="nombre" value = "{{$producto->nombre}}"type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('Precio') }}</label>

                <div class="col-md-6">
                    <input autocomplete="off" id="precio" value = "{{$producto->precio}}"type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}">

                    @error('precio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="tipoproducto" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de producto') }}</label>

                <div class="col-md-6">
                    <select name="tipoproducto" id="tipoproducto" class="form-control @error('tipoproducto') is-invalid @enderror">                     
                        @foreach($tipoproducto as $tipoproducto)
                        @if($tipoproducto->id == $producto->tipoproducto->id)
                        <option selected="true"value="{{$tipoproducto->id}}" {{ old('tipoproducto') == $tipoproducto->id ? 'selected': ''}}>{{$tipoproducto->descripcion}}</option>
                        @else
                        <option value="{{$tipoproducto->id}}" {{ old('tipoproducto') == $tipoproducto->id ? 'selected': ''}}>{{$tipoproducto->descripcion}}</option>
                        @endif
                        
                        @endforeach
                    </select>                    

                    @error('tipoproducto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>                   
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4" style = "text-align: center">
                    <button type="submit" class="btn btn-primary botonsito">
                        {{ __('Modificar Producto') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection