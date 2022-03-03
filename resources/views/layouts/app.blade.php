<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
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
                <nav class="navbar navbar-expand-md" style ="border 8px">
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
                                                <a class="nav-link navtext" href="{{ route('Tipo_producto.index') }}">{{ __('Crear Tipo de Producto') }}</a>
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
            <main class="py-4">
                    @yield('content')
            </main>
        </div>
    
           

</body>
</html>
