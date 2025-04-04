@extends('sidebar')

@section('title', 'Editar evento')

@section('estilos_adicionales')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      body {
          font-family: 'Exo', sans-serif;
          background-color: var(--color-bk);
          color: var(--color-txt);
      }
      .main-button {
      background: blue;
          color: white;
          cursor: pointer;
          padding: 10px;
          border: none;
          border-radius: 10px;
      }
      .main-button:hover {
        background:rgb(61, 61, 246);
      }
      
      /* Contenedores y tarjetas */
      .container {
          max-width: 800px;
          margin: auto;
          padding: 20px;
          background-color: var(--color-bk-card);
          border-radius: 20px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      
      .header-col {
          background: #E3E9E5;
          color: #536170;
          text-align: center;
          font-size: 20px;
          font-weight: bold;
      }
      
      .header-calendar {
          background: #EE192D;
          color: white;
      }
      
      /* Campos de formulario */
      .fomr-group {
          margin-bottom: 15px;
      }
      
      .fomr-group h4 {
          color: #0f1419;
          font-size: 18px;
          margin-bottom: 5px;
      }
      
      input[type="text"], input[type="date"] {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          background-color: #f5f5f5;
          border-radius: 5px;
      }
      
      /* Botones */
      .btn {
          display: inline-block;
          padding: 10px 20px;
          font-size: 16px;
          text-align: center;
          cursor: pointer;
          border-radius: 5px;
          text-decoration: none;
      }
      
      .btn-info {
          background: var(--color-bk-button);
          color: white;
          border: none;
      }
      
      .btn-info:hover {
          background: var(--color-bk-button-hover);
      }
      
      .btn-default {
          background: #e6ebff;
          color: blue;
          border: 1px solid blue;
      }
      
      .btn-default:hover {
          background: #cfd8ff;
      }
      
      /* Calendario */
      .box-day, .box-dayoff {
          border: 1px solid #E3E9E5;
          height: 150px;
          text-align: center;
          vertical-align: middle;
          display: flex;
          align-items: center;
          justify-content: center;
      }
      
      .box-dayoff {
          background-color: #ccd1ce;
      }
      
      /* Textos */
      p {
          color: var(--color-txt-gray);
      }

    </style>
@endsection

@section('contenido')

    <div class="container">
      <div style="height:50px"></div>
      <p class="lead">
      <h3>Evento</h3>
      <p>Detalles de evento</p>
      <a class="btn btn-default"  href="{{ asset('index') }}">Atras</a>
      <hr>



      <div class="col-md-6">
        <form action="{{ asset('guardacambios') }}" method="POST" enctype ="multipart/form-data">
        {{ csrf_field() }}
          <input type= 'hidden' name = 'id_evento' value = "{{$query->id_evento}}"> 
        <div class="fomr-group">
            <h4>Titulo</h4>
            <input type="text" class="big" name="titulo" placeholder="Ingresa el titulo" maxlength="50" value="{{$query->titulo}}">
            @if($errors->first('titulo'))
                <p class="text-warning">{{$errors->first('titulo')}}</p>
            @endif
          </div>
          <div class="fomr-group">
            <h4>Descripcion del Evento</h4>
            <input type="text" class="big" name="descripcion" placeholder="Ingresa la descripcion" maxlength="50" value="{{$query->descripcion}}">
            @if($errors->first('descripcion'))
                <p class="text-warning">{{$errors->first('descripcion')}}</p>
            @endif
          </div>
          <div class="fomr-group">
            <h4>Fecha</h4>
            <input type="date" class="big" name="fecha" placeholder="Ingresa la fecha" value="{{$query->fecha}}" min="{{ date('Y-m-d') }}" required>
            @if($errors->first('fecha'))
                <p class="text-warning">{{$errors->first('fecha')}}</p>
            @endif
          </div>
          <br>
          <input type="submit" class="main-button" name="guardar" value="Guardar">
        </form>
      </div>
    </div> <!-- /container -->

@stop
