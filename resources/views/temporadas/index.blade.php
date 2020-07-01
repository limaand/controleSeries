@extends('layout')

@section('cabecalho')
  Temporadas {{$serie->nome}}
@endsection

@section('conteudo')
    


<ul class="list-group">
    @foreach ($temporadas as $temporada)
        <li class="list-group-item  d-flex justify-content-between align-items-center">
           <a href="{{route('episodios.index', ['temporada'=>$temporada->id])}}">
              Temporada {{$temporada->numero}}
           </a>

           <span class="badge badge-secondary">
            0 / {{ $temporada->episodios->count() }}
           </span>
        </li>
    @endforeach
</ul>

@endsection
