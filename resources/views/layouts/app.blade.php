<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body> 
    <div class="div1"></div>
        <div class="div2" id="app">
            <div class="mydiv">
                <nav class="mynavbar navbar navbar-expand-md navbar-light" style ="border 8px">
                    <div class="container">
                        <a class="navbar-brand navtext" href="{{ url('/') }}">
                            {{ ('Inicio') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto"> 
                                <!-- Authentication Links -->
                                <li class="nav-item">                                            
                                    <a class="nav-link navtext" href="{{ route('QR.index') }}">{{ __('QR') }}</a>
                                </li>
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            
                                            <a class="nav-link navtext" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                            <a class="nav-link navtext" href="{{ route('register') }}">{{ __('Crear Cuenta') }}</a>
                                        </li>
                                    @endif
                                @else
                                    @if (Auth::user()->id_rol==2)
                                        <li class="nav-item" style="margin-right: 25px">
                                                <a class="nav-link navtext" href="{{ route('Tipo_producto.index') }}">{{ __('Tipo de Producto') }}</a>
                                        </li>
                                        <li class="nav-item" style="margin-right: 25px">
                                                <a class="nav-link navtext" href="{{ route('Usuarios.index') }}">{{ __('Administrar Usuarios') }}</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->id_rol==1)
                                    <li class="nav-item" style="margin-right: 25px">
                                            <a class="nav-link navtext" href="{{ route('Producto.index') }}">{{ __('Productos') }}</a>
                                    </li>
                                    @endif                                    
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle navtext" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('modusuario') }}">
                                                {{ __('Modificar') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesion') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest                                
                            </ul>
                        </div>                        
                    </div>
                </nav>                
            </div>                        
            <main class="py-5">
                    @yield('content')
            </main>
        </div>
    
        <footer class="bg-dark text-center text-white">
            <!-- Section: Social media -->
            <section
              class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
            >
              <!-- Left -->
              {{-- <div class="me-5 d-none d-lg-block">
                <span> </span>
              </div> --}}
              <!-- Left -->
          
              <!-- Right -->
              <div>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-github"></i>
                </a>
              </div>
              <!-- Right -->
            </section>
            <!-- Section: Social media -->
          
            <!-- Section: Links  -->
            <section class="">
              <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      <i class="fas fa-gem me-3"></i>Sistema de inventario
                    </h6>
                    <p>
                        Conectando el agro con la tecnología.
                    </p>
                  </div>
                  <!-- Grid column -->
          
                  <!-- Grid column -->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Products
                    </h6>
                    <p>
                      <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Laravel</a>
                    </p>
                  </div>
                  <!-- Grid column -->
          
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Useful links
                    </h6>
                    <p>
                      <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Help</a>
                    </p>
                  </div>
                  <!-- Grid column -->
          
                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                      <i class="fas fa-envelope me-3"></i>
                      info@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->
              </div>
            </section>
            <!-- Section: Links  -->
          
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
              © 2022 Copyright:
              <a class="text-reset fw-bold" target="blank" href="https://www.udistrital.edu.co/inicio">Universidad Distrital</a>
            </div>
            <!-- Copyright -->
          </footer>

          
</body>
</html>
