@extends('layout')

@section('cabecalho')
  Séries 
@endsection

@section('conteudo')
   





  @if(!empty($mensagem))
      <div class="alert alert-success" role="alert">
        {{$mensagem}}
      </div>
    
  @endif


  
   <a href="{{route('series.create')}}" class="btn btn-primary mb-4"> Adicionar </a>
   
   
   
   
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-center">
                {{$serie->nome}}

            <form action="{{route('series.destroy', ['serie'=>$serie->id])}}" 
            method="post" onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}} ?')">
                @csrf
                @method('DELETE')        
                <input type="hidden" name="user" value="{{$serie->id}}">
                <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
            </li>
        @endforeach
    </ul>

@endsection
   
