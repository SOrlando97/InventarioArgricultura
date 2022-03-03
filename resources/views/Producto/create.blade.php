@extends('layouts.app')    
@section('content')
<div style="margin-left: 15%">
<a class = "btn btn-secondary botonsito" href="{{route('Producto.index')}}">Volver</a>
</div>
<div class="container">
<div class="carta-inicio card " style="margin-top: 20px">
    <div class="card-header">{{ __('Crear Producto') }}</div>

    <div class="card-body">
        <form class="formsito" method="POST" action="{{ route('Producto.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input autocomplete="off" id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">

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
                    <input autocomplete="off" id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}">

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
                        <option value="">--Seleccione--</option>
                        @foreach($tipoproducto as $tipoproducto)
                        <option value="{{$tipoproducto->id}}" {{ old('tipoproducto') == $tipoproducto->id ? 'selected': ''}}>{{$tipoproducto->descripcion}}</option>
                        @endforeach
                    </select>
                    

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>                       

            

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Crear Cuenta') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection