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
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fa fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>



            <span class="d-flex">
               
                <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                    <i class="fa fa-edit"></i>
                </button>
               
                <a href="{{route('temporadas.index', ['serie'=>$serie->id])}}" class="btn btn-info btn-sm mr-1"> 
                    <i class="fa fa-external-link"></i>
                </a> 

                <form action="{{route('series.destroy', ['serie'=>$serie->id])}}" 
                method="post" onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}} ?')">
                    @csrf
                    @method('DELETE')        
                    <input type="hidden" name="user" value="{{$serie->id}}">
                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>

            </span>    
            </li>
        @endforeach
    </ul>



    <script>
        function toggleInput(serieId) {
            const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
            if (nomeSerieEl.hasAttribute('hidden')) {
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }
    
        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-nome-serie-${serieId} > input`)
                .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/series/${serieId}/editaNome`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            });
        }
    </script>

@endsection
   
