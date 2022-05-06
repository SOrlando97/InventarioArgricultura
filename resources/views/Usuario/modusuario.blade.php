@extends('layouts.app')
@section('content')

<section class="text-center">
    <!-- Background image -->
    <div class="mt-4 p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->
  
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -250px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Edición usuario</h2>
            <form  method="POST" action="{{ route('change.password')}}">
                @csrf
                <div class="row mb-3 text-center mt-3">
                    <label class="col-md-4 col-form-label mt-4 text-md-end" for="current_password" >{{__('Contraseña Actual')}}</label>
                    <div class="col-md-6">                        
                        <input name="current_password" class="form-control mt-4 @error('current_password') is-invalid @enderror" type="password" autocomplete = "current_password">
                        @if(session()->has('msg'))
                            <div class="alert alert-danger">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <script>
                                //alert ('Contraseña cambiada')
                                Swal.fire({
                                    icon: 'success',
                                    title: 'La contraseña se cambio exitosamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                            </script>
                        @endif
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
                            <button type="submit" class="mt-4 btn btn-dark btn-ver">
                                {{ __('Cambiar Contraseña') }}
                            </button>                                    
                        </div>
                    </div>          
                </div>
            </form>
        </div>
            <div>
                <h2 class="fw-bold mt-5 mb-5">Eliminar mi cuenta</h2>
                    <div class="row mb-3 text-center mt-3">
                        <div class="text-center">
                            @csrf
                            <elim-cuenta usuario-actual = {{Auth::user()->id}}>
                            </elim-cuenta>
                        </div>
                    </div>  
            </div>               
        </div>     
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="content-div2">
    <div class="content-div" style ="background-color: #FFFFFF">
            <div>
            
    </div>
</div>
@endsection