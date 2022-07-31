@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a class = "mt-1 btn btn-dark botonsito" href="{{route('Producto.show',$producto->id)}}">Volver</a>
    </div>

      <div class="row">
        <div class="col-sm-6">
            <div class="card mt-4" >
                <div class="card-header text-center"><strong>{{ __('Historial de salida (venta) de ') }}{{$producto->nombre}}</strong></div>
        
                <div class="card-body">
                    <form class="formsito" method="POST" action="{{ route('historialsalida.store',$producto->id)}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad Vendida (Kg)') }}</label>
        
                            <div class="col-md-7">
                                <input autocomplete="off" id="cantidad"
                                 type="number" min="1" class="form-control 
                                 @error('cantidad') is-invalid @enderror" 
                                 name="cantidad" value="{{ old('cantidad') }}"
                                 required
                                >
        
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="precioventa" class="col-md-4 col-form-label text-md-end">{{ __('Precio al que se vendio (cada Kg)') }}</label>
        
                            <div class="col-md-7">
                                <input autocomplete="off" id="precioventa"
                                     type="number" min="1" class="form-control
                                    @error('precioventa') is-invalid @enderror" 
                                    name="precioventa" value="{{ old('precioventa') }}"
                                    required
                                >
        
                                @error('precioventa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success btn-ver">
                                    {{ __('Añadir Venta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mt-4">
                <div class="card-header text-center">
                    <strong>{{ __('Descargar Informe de ') }}{{$producto->nombre}}</strong>
                </div>
                    <form action="{{ route('historialsalida.PDF',$producto->id)}}" method="get">
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="" class="col-md-2  col-form-label">Desde:</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control 
                                    @error('fechainicio') is-invalid @enderror" 
                                    name="fechainicio" id="fechainicio" value="{{ old('fechainicio') }}"
                                    required
                                >
                                @error('fechainicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-2 col-form-label">Hasta:</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control
                                     @error('fechafin') is-invalid @enderror"
                                     name="fechafin" id="fechafin" value="{{ old('fechafin') }}"
                                     required
                                >
                                @error('fechafin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                                </div>
                            </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success btn-ver mt-3">
                                            {{ __('Descargar') }}
                                        </button>
                                    </div>
                                </div>
                            @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                            @endif
                        </div>
                    </form>                
            </div>  
        </div>
      </div>

      <div class ="col-12 p-0 mt-3">
          <table class="table tabla1 table-hover">
              <thead>
                  <tr>
                      <th>Cantidad Vendida</th>
                      <th>Precio de venta</th>
                      <th>Fecha</th>
                  </tr>
              </thead> 
              <tbody>
                  @foreach($historialsalida as $historialsal)   
                  <tr>
                      <td>{{$historialsal->cantidad}} Kg</td>
                      <td>{{$historialsal->precioventa}} /Kg</td>
                      <td>{{$historialsal->fecha}}</td>
                  </tr>
                  @endforeach
      
                  
              </tbody>           
          </table>
          <div class="d-flex justify-content-end">
                  {!! $historialsalida->links()!!}
          </div>
      </div>
    </div>
@endsection