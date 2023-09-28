<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

    @include('fixed.header')
    
    <div class="row">
        <h1 class="text-center">Bienvenido a Musicapp</h1>
    </div>
   
    <div class="row text-center">
        <p>En esta aplicación podrás subir tu musica donde y cuando quieras.</p>
        <p>Es tán fácil como registrarte</p>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('login') }}"><button class="btn btn-success float-end">Iniciar sesión</button></a>
            
        </div>

        <div class="col-md-6">
            <a href="{{ route('register') }}"><button class="btn btn-success">Registrarse</button></a>
            
        </div>
    </div>

    @include('fixed.footer')


</body>
</html>