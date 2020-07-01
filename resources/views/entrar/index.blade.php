@extends('layout')

@section('cabecalho')
  login
@endsection

@section('conteudo')
   
   @include('erros', ['erros'=> $errors]) 

   <form action="" method="post">
     
      @csrf
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control"  required >
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" required min="1" >
       
      </div>
      
      <button type="submit" class="btn btn-primary mt-3"> Entrar </button>

    <a href="{{ route('registro.create')}}" class="btn btn-secondary mt-3">
         Registra-se
      </a>

   </form>

@endsection
   