<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Estilos propios -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,100;1,300&display=swap');
        body{
            font-family:  Roboto,sans-serif;
            margin:0;
            padding:0;
            background-color:#6096B4;
        }
        .color-container{
            width:16px;
            height:16px;
            display:inline-block;
            border-radius:5px;
        }
        a{
            text-decoration:none;
            color:#0d0202;
        }
        p{
            color: #0d0202;
        }
        h1,h2,h3,h5,h6{
            color: #0d0202;
        }
        .form{
            background-color:#93BFCF;
        }
        .result-row{
            background-color:#BDCDD6;
        }
        .form-control{
            background: #BDCDD6;
        }
        .form-control:focus{
            background: #BDCDD6;
            box-shadow:none;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('todos')}}">Tareas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('categorias.index')}}">Categorías</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    @yield('content')
</body>
</html>
