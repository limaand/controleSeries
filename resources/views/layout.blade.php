<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Controle de Séries</title>
</head>
<body>

       
       <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
    
         <a class="navbar-brand" href="{{route('series.index')}}">Home</a>
         @auth
         <a class="text-danger" href="{{route('sair')}}">Sair</a>    
         @endauth

         @guest
         <a class="text-danger" href="/entrar">Entrar</a>    
         @endguest
         
      
    </nav>



    <div class="container">

    
    
        <div class="jumbotron">
            <h1 class="display-4"> @yield('cabecalho') </h1>
        </div>

       @yield('conteudo')  
   
   </div>
</body>
</html>