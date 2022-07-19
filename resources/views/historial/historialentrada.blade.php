@extends('layouts.app')

@section('content')
<div style="margin-left: 15%">
<a class = "mt-5 btn btn-secondary botonsito" href="{{route('Producto.show',$producto->id)}}">Volver</a>
</div>
<div class="container">
    <div class="carta-inicio card table" style="margin-top: 20px">
        <div class="card-header">{{ __('Historial de entrada de ') }}{{$producto->nombre}}</div>

        <div class="card-body">
            <form class="formsito" method="POST" action="{{ route('historialentrada.store',$producto->id)}}">
                @csrf
                <div class="row mb-3">
                    <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad (Kg)') }}</label>

                    <div class="col-md-6">
                        <input autocomplete="off" id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}">

                        @error('cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Añadir Cantidad') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>Cantidad añadida</th>
                <th>Fecha</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($historialentrada as $historialentrada)   
            <tr>
                <td>{{$historialentrada->cantidad}} Kg</td>
                <td>{{$historialentrada->fecha}}</td>
            </tr>
            @endforeach

            
        </tbody>           
    </table>
</div>
@endsection