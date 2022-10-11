@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a class = "mt-5 btn btn-dark botonsito" href="{{route('Producto.show',$producto->id)}}">Volver</a>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <strong>{{ __('Descargar Informe de ') }}{{$producto->nombre}}</strong>
                </div>
                    <form action="{{ route('historialentrada.PDF',$producto->id)}}" method="get">
                        <div class="card-body">
                                <label for="">Desde</label>
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
                                <label for="">hasta</label>
                                <input type="date" class="form-control 
                                    @error('fechafin') is-invalid @enderror
                                    "name="fechafin" id="fechafin" value="{{ old('fechafin') }}"
                                    required
                                    >
                                @error('fechafin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
        <div class="col-sm-6">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <strong>{{ __('Historial de entrada de ') }}{{$producto->nombre}}</strong>
                </div>
        
                <div class="card-body">
                    <form class="formsito" method="POST" action="{{ route('historialentrada.store',$producto->id)}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad (Kg)') }}</label>
        
                            <div class="col-md-6">
                                <input autocomplete="off" id="cantidad" type="number" min="1"
                                    class="form-control @error('cantidad') is-invalid @enderror" 
                                    name="cantidad" value="{{ old('cantidad') }}" required
                                >
        
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dias" class="col-md-4 col-form-label text-md-end">{{ __('Dias de vida') }}</label>
        
                            <div class="col-md-6">
                                <input autocomplete="off" id="dias" type="number" min="1"
                                    class="form-control @error('dias') is-invalid @enderror" 
                                    name="dias" value="{{ old('dias') }}" required
                                >
        
                                @error('dias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success btn-ver">
                                    {{ __('Añadir Cantidad') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
        
    </div>

    <div class ="table-responsive col-md-12 mx-auto  mt-3">
        <table class="table tabla1 table-hover">
            <thead>
                <tr>
                    <th>Cantidad añadida</th>
                    <th>Cantidad Actual</th>
                    <th>Fecha</th>
                    <th>Días para que se dañe</th>
                    <th>Dañado</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($historialentrada as $historialentr)   
                <tr>
                    <td>{{$historialentr->cantidad}} Kg</td>
                    <td>{{$historialentr->cantfaltante}} Kg</td>
                    <td>{{$historialentr->fecha}}</td>
                    <td>{{$historialentr->dias}}</td>
                    @if($historialentr->dañado)
                        <td>Si</td>
                    @else
                        <td>No</td>
                    @endif
                    
                </tr>
                @endforeach

                
            </tbody>           
        </table>
        <div class="d-flex justify-content-end">
                {!! $historialentrada->links()!!}
            </div>
    </div>

</div>

@endsection