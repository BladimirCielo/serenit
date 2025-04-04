<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet">
    
    <title>Inicio de sesión | SerenIT</title>

    <!-- Icono de la pestaña -->
    <link rel="icon" href="{!! asset ('archivos/favicon.ico') !!}" type="image/x-icon">

</head>

<body>

    <div class="container {{ ($errors->any() && old('crearcuenta')) ? 'active' : '' }}" id="container">
         <!-- SECCIÓN: CREAR CUENTA -->
        <div class="form-container sign-up">
            <form action ="{{route('crearusuario')}}" method= "POST">
            {{ csrf_field() }}
                <h1>Crear Cuenta</h1>
                <input type="text" name="nombre"  placeholder="Nombre" value="{{old('nombre')}}">
                    @if($errors->first('nombre'))
                        <p class="text-warning">{{$errors->first('nombre')}}</p>
                    @endif
                <input type="text" name="apellido_pat"  placeholder="Apellido Paterno" value="{{old('apellido_pat')}}">
                    @if($errors->first('apellido_pat'))
                        <p class="text-warning">{{$errors->first('apellido_pat')}}</p>
                    @endif
                <input type="text" name="apellido_mat"  placeholder="Apellido Materno" value="{{old('apellido_mat')}}">
                    @if($errors->first('apellido_mat'))
                        <p class="text-warning">{{$errors->first('apellido_mat')}}</p>
                    @endif
                <input type="email" name="email"  placeholder="Correo electrónico" value="{{old('email')}}">
                    @if($errors->first('email'))
                        <p class="text-warning">{{$errors->first('email')}}</p>
                    @endif
                <input type="password" name="contrasenia" placeholder="Contraseña" value="{{old('contrasenia')}}">
                    @if($errors->first('contrasenia'))
                        <p class="text-warning">{{$errors->first('contrasenia')}}</p>
                    @endif
                <input type="password" name="contrasenia_confirmation" placeholder="Confirmar contraseña">
                    @if($errors->first('contrasenia'))
                        <p class="text-warning">{{$errors->first('contrasenia')}}</p>
                    @endif
                <label for="id_carrera">Carrera</label>
                <select name="id_carrera" id="">
                    @foreach($carreras as $carrera)
                        <option value="{{$carrera->id_carrera}}">{{$carrera->nombre_carrera}}</option>
                    @endforeach
                </select>
                <input type="submit" name="crearcuenta" value="CREAR CUENTA" class="button">
            </form>
        </div>
         <!-- SECCIÓN: INICIAR SESIÓN -->
        <div class="form-container sign-in">
            <form action =  "{{route('validar')}}" method= "POST">
            {{ csrf_field() }}
                <h1>Iniciar Sesión</h1>
                <span>Ingresa tus datos para iniciar sesión</span>
                <input type="email" name="email_signin" placeholder="Correo electrónico">
                @if($errors->first('email_signin'))
                    <p class="text-warning">{{ $errors->first('email_signin') }}</p>
                @endif
                <input type="password" name="contrasenia_signin" placeholder="Contraseña">
                @if($errors->first('contrasenia_signin'))
                <p class="text-warning">{{ $errors->first('contrasenia_signin') }}</p>
                @endif
                <!-- <a href="#">¿Olvidaste tu contraseña?</a> -->
                <input type="submit" value="INGRESAR" class="button">
                <div class="d-sm-flex mb-5 align-items-center">
                    @if (Session::has('mensaje'))    
                      <div class="alert alert-dismissible alert-warning">
                          <h6 class="alert-heading">AVISO</h6>
                          <p class="mb-0">{{ Session::get('mensaje') }}</p>
                      </div>
                    @endif
                </div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="{!! asset('archivos/logo-sidebar.png') !!}" id="logo-login" alt="logo-login"></img>
                    <p>Regístrate ingresando tus datos para poder acceder a la plataforma</p>
                    <button class="hidden btn-change" id="login">¿Ya tienes una cuenta?</button>
                  </div>
                  <div class="toggle-panel toggle-right">
                    <img src="{!! asset('archivos/logo-sidebar.png') !!}" id="logo-login" alt="logo-login"></img>
                    <p> Plataforma digital enfocada a promover la salud mental de los estudiantes
                        universitarios, facilitando recursos que contribuyan a su bienestar emocional y al equilibrio
                        entre lo académico y lo personal.</p>
                    <button class="hidden btn-change" id="register">¿No tienes cuenta?</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
      const container = document.getElementById('container');
      const registerBtn = document.getElementById('register');
      const loginBtn = document.getElementById('login');

      registerBtn.addEventListener('click', () => {
          container.classList.add("active");
      });

      loginBtn.addEventListener('click', () => {
          container.classList.remove("active");
      });

        // Si hubo errores al registrar, mantener la vista en 'signup'
        @if ($errors->any() && old('crearcuenta'))
            container.classList.add("active");
        @endif
    </script>
</body>

</html>