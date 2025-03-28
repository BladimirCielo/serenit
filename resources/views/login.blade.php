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

    <div class="container" id="container">
         <!-- SECCIÓN: CREAR CUENTA -->
        <div class="form-container sign-up">
            <form>
                <h1>Crear Cuenta</h1>
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Apellidos">
                <input type="email" placeholder="Correo electrónico">
                <input type="password" placeholder="Contraseña">
                <input type="password" placeholder="Confirmar contraseña">
                <label for="Carrera">Carrera</label>
                <select name="" id="">Carrea
                    <option value="Biologia">Biotecnología</option>
                    <option value="Biologia">Electrónica</option>
                    <option value="Biologia">Financiera</option>
                    <option value="Biologia">Industrial</option>
                    <option value="Biologia">Mecatrónica</option>
                    <option value="Biologia">Sistemas Automotrices</option>
                    <option value="Biologia">Tecnologías de la Información</option>
                </select>
                <button>Crear Cuenta</button>
            </form>
        </div>
         <!-- SECCIÓN: INICIAR SESIÓN -->
        <div class="form-container sign-in">
            <form action =  "{{route('validar')}}" method= "POST">
            {{ csrf_field() }}
                <h1>Iniciar Sesión</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div> -->
                <span>Ingresa tus datos para iniciar sesión</span>
                <input type="email" name="email" placeholder="Correo electrónico">
                @if($errors->first('email'))
                    <p class="text-warning">{{ $errors->first('email') }}</p>
                @endif
                <input type="password" name="contrasenia" placeholder="Contraseña">
                @if($errors->first('contrasenia'))
                <p class="text-warning">{{ $errors->first('contrasenia') }}</p>
                @endif
                <a href="#">¿Olvidaste tu contraseña?</a>
                <input type="submit" value="Ingresar" class="">
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
                    <button class="hidden" id="login">¿Ya tienes una cuenta?</button>
                  </div>
                  <div class="toggle-panel toggle-right">
                    <img src="{!! asset('archivos/logo-sidebar.png') !!}" id="logo-login" alt="logo-login"></img>
                    <p> Plataforma digital enfocada a promover la salud mental de los estudiantes
                        universitarios, facilitando recursos que contribuyan a su bienestar emocional y al equilibrio
                        entre lo académico y lo personal.</p>
                    <button class="hidden" id="register">¿No tienes cuenta?</button>
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
    </script>
</body>

</html>