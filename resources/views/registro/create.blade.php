@extends('layout')

@section('cabecalho')
  Registrar-se
@endsection

@section('conteudo')
   
   @include('erros', ['erros'=> $errors]) 

<form  action="{{ route('registro.store') }}" method="post">
     
      @csrf
     
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="name" id="name" class="form-control"  required >
      </div>
     
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control"  required >
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" required min="1" >
       
      </div>
      
      <button type="submit" class="btn btn-primary mt-3"> Registrar </button>

      

   </form>

@endsection
   