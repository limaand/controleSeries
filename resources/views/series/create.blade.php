@extends('layout')

@section('cabecalho')
  Adicionar Série 
@endsection

@section('conteudo')


        
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  


    <form action="{{route('series.store')}}" method="post">
        @csrf
        <div class="form-group">
        <label for="nome" class=""> Nome:</label> 
        <input type="text" name="nome" id="nome" class="form-control">    
        </div> 

        <button class="btn btn-success" type="submit">Adicionar</button>

    </form>
@endsection
        
   