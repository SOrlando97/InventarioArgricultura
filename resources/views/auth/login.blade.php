@extends('layouts.app')

@section('content')
<div class="container">

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: rgb(30 30 30)">
            Sistema de inventario<br />
          </h1>
          <p class="mb-4 opacity-70" style="color: rgb(30 30 30)">
            Si no tienes una cuenta,  <a class="text-white text-decoration-underline" href="{{ route('register')}}">¡Registrate!</a>
          </p>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
  
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
                <form class="formsito" method="POST" action="{{ route('login') }}">
                    @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  
  
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Correo electronico</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ejemplo@correo.com" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*********">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                {{-- <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                
                    <!-- Submit button -->
                <button type="submit" class="btn btn-dark btn-block mb-4">
                    {{ __('Iniciar Sesion') }}
                  </button>
                    

                    <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Olvidaste la contraseña?') }}
                        </a>
                    @endif -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
  <!-- Section: Design Block -->
  
@endsection
