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
       
        <div class="row">
            <div class="col-sm-8" >
                <label for="nome"> Nome:</label> 
                <input type="text" name="nome" id="nome" class="form-control">
            
            
            </div>
            <div class="col-sm-2" >
                <label for="temporadas"> Nº Temporadas:</label> 
                <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control">
            </div>
            <div class="col-sm-2" >
                <label for="episodios" > Ep. por temporadas:</label> 
                <input type="number" name="ep_por_temporada" id="ep_por_temporada" class="form-control">
            
            </div>
        </div>

      



        
        
       
        <button class="btn btn-success mt-4" type="submit">Adicionar</button>

    </form>
@endsection
        
   