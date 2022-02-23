@extends('layouts.app')
@section('content')
<div class="content-div2">
    <div class="content-div" style ="background-color: #FFFFFF">
            <div>
            <form  method="POST" action="{{ route('change.password')}}">
                @csrf
                <div class="form-titulo text-center">{{__('Modificar Usuario')}}</div>
                <div class="row mb-3 text-center mt-3">
                    <label class="col-md-4 col-form-label mt-4 text-md-end" for="current_password" >{{__('Contraseña Actual')}}</label>
                    <div class="col-md-6">
                        <input name="current_password" class="form-control mt-4 @error('current_password') is-invalid @enderror" type="password" autocomplete = "current_password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="col-md-4 col-form-label  mt-4 text-md-end" for="new_password" >{{__('Contraseña Nueva')}}</label>
                    <div class="col-md-6">
                        <input name="new_password" class="form-control mt-4 @error('new_password') is-invalid @enderror" type="password" autocomplete = "new_password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    <label class="col-md-4 col-form-label mt-4 text-md-end" for="new_confirm_password" >{{__('Confirmar Contraseña')}}</label>
                    <div class="col-md-6">
                        <input name="new_confirm_password" class="form-control mt-4 @error('new_confirm_password') is-invalid @enderror" type="password" autocomplete = "new_confirm_password">
                        @error('new_confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       
                    </div>  
                    <div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Cambiar Contraseña') }}
                            </button>                                    
                        </div>
                    </div>          
                </div>
            </form>
        </div>
        <div ">
            <form  method="POST" action="{{ route('change.delete',['user'=>Auth::user()->id ] ) }}">
                <div class="form-titulo text-center">{{__('Eliminar Cuenta')}}</div>
                <div class="row mb-3 text-center mt-3">
                    <div class="text-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ __('Eliminar Cuenta') }}
                        </button>  
                    </div>            
                </div>
            </form>
        </div>     
    </div>
</div>
@endsection