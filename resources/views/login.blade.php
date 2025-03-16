<!doctype html>
<html lang="es">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="{{ asset('css/login/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>

    <title>Inicio de sesión | SerenIT</title>
  </head>
  <body>
  

    <div class="d-md-flex half">
      <div class="bg" style="background-image: url('/serenit/public/archivos/login.jpg');"></div>
      <div class="contents">

        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
              <div class="form-block mx-auto">
                <div class="text-center mb-5">
                <h3>Iniciar sesión</h3>
                </div>
                <form >
                  <div class="form-group first">
                    <label for="username">Usuario</label>
                    <input type="text" class="form-control" placeholder="Ingresa tu usuario" name = 'nombre_usuario'>
                  </div>
                  <div class="form-group last mb-3">
                    <label for="password">Contraseña</label>
                    <input type="text" class="form-control" placeholder="Ingresa tu contraseña"name = 'contrasena'>
                  </div>
                  
                  
                  <input type="submit" value="Ingresar" class="btn btn-block btn-primary boton">
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    
    

</body>
</html>