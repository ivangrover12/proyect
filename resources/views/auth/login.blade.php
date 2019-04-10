<html lang="en">
<head>
    <title>Certificacion - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/vendor/bootstrap/css/bootstrap.min.css")}}>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/fonts/iconic/css/material-design-iconic-font.min.css")}}>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/vendor/animate/animate.css")}}>
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href={{asset("init/login/vendor/css-hamburgers/hamburgers.min.css")}}>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/vendor/animsition/css/animsition.min.css")}}>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/vendor/select2/select2.min.css")}}>
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href={{asset("init/login/vendor/daterangepicker/daterangepicker.css")}}>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href={{asset("init/login/css/util.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("init/login/css/main.css")}}>
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{asset('init/login/images/LOG.png')}});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        SISTEMA DE CERTIFICACION
                    </span>
                    
                    <div class="wrap-input100 validate-input m-b-23">
                        <span class="label-input100">Nombre de usuario</span>
                        <input class="input100" type="text" name="username" placeholder="Escriba su nombre de usuario" value={{ old('username')}}>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" type="password" name="password" placeholder="Escriba su contraseña">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    
                    <div class="text-right p-t-8 p-b-31">
                        
                    </div>
                    @if ($errors->has('username'))
                        <div class="alert alert-danger text-center">
                            <strong>¡Error!</strong> Datos incorrectos, verifique por favor
                        </div>
                    @endif
                    
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Ingresar
                            </button>
                        </div>
                    </div>

                    {{-- <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div> --}}

                    {{-- <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div> --}}

                    {{-- <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Or Sign Up Using
                        </span>

                        <a href="#" class="txt2">
                            Sign Up
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src={{asset("init/login/vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
    <script src={{asset("init/login/vendor/animsition/js/animsition.min.js")}}></script>
<!--===============================================================================================-->
    <script src={{asset("init/login/vendor/bootstrap/js/popper.js")}}></script>
    <script src={{asset("init/login/vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
    <script src={{asset("init/login/vendor/select2/select2.min.js")}}></script>
<!--===============================================================================================-->
    <script src={{asset("init/login/vendor/daterangepicker/moment.min.js")}}></script>
    <script src={{asset("init/login/vendor/daterangepicker/daterangepicker.js")}}></script>
<!--===============================================================================================-->
    <script src={{asset("init/login/vendor/countdowntime/countdowntime.js")}}></script>
<!--===============================================================================================-->
    <script src={{asset("init/login/js/main.js")}}></script>

</body>
</html>