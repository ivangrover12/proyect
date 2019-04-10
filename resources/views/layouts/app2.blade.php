<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIP-MDRYT</title>
    <link rel="stylesheet" href="{{asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/print.min.css') }}">
    <style>
        .navbar-default .navbar-nav > li.dropdown:hover > a, 
        .navbar-default .navbar-nav > li.dropdown:hover > a:hover,
        .navbar-default .navbar-nav > li.dropdown:hover > a:focus {
            background-color: rgb(231, 231, 231);
            color: rgb(85, 85, 85);
        }
        li.dropdown:hover > .dropdown-menu {
            display: block;
        }
    </style>
    @yield('styles')
</head>
<body>
        <div class="row">
            <div class="col-md-8 pl-5 pt-3">
                <h2>SIP-MDRYT</h2>
                <h4>Sistema Presupuestario </h4>
                <h4>Ministerio de Desarrollo Rural y Tierras </h4>
            </div>
            <div class="col-md-4">
                <h6>Usuario: </h6>
                <h6>Fecha:</h6>
            </div>
        </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light "  >
            
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            <li>
              <a class="nav-link" href="{{ route('certificado.index') }} ">
                Certificaciones
              </a>
            </li>
            <li>
            <a class="nav-link" href="{{ route('registro.index') }} ">Registro
              </a>
               
              </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adiciones</a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('certificado.create') }}">DA y UE</a>
                <a class="dropdown-item" href="{{ route('certificado.index') }}">Estructura Programatica</a>
                <a class="dropdown-item" href="{{ route('certificado.index') }}">Documentos</a>
                <a class="dropdown-item" href="{{ route('certificado.index') }}">Ff</a>
                <a class="dropdown-item" href="{{ route('certificado.index') }}">Categorias Programaticas</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Salir</a>
            </li>
          </ul>
          
        </div>
      </nav>
      <div class="container mt-3" id="app">
          @yield('content')
      </div>

    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/print.min.js') }}"></script>
    <script src="{{ asset('js/numberconvert.js') }}"></script>
    <script>
        
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        
        let token = document.head.querySelector('meta[name="csrf-token"]');
        
        if (token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        } else {
            console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
        }
    </script>
    
    @yield('scripts')
</body>
</html>