<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use Illuminate\Http\Request;

class SeriesContoller extends Controller
{
   
   //só pode acessar os métodos se estiver logado 
   //na aplicação
  /* public function __construct()
   {
     $this->middleware('auth');
   }*/



    public function index(Request $request){
       
      $series =  Serie::query()->orderBy('nome')->get();
      
      $mensagem =  $request->session()->get('mensagem');
      
      return view('series.index', [
           'series' => $series, 'mensagem' => $mensagem
       ]);

    }

    

    public function create(){
                
        return view('series.create');
    }


    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie){
       

       $serie = $criadorDeSerie->criarSerie(
             $request->nome, 
             $request->qtd_temporadas,
             $request->ep_por_temporada
       );
       


       $request->session()->flash(
           'mensagem', 
           "Série #($serie->id) e suas temporadas e episódios criados com sucesso.  ($serie->nome)" 
        );
     
       return redirect()->route('series.index');
       

    }

    public function destroy(Request $request){
          
          Serie::destroy($request->id);
          $request->session()
            ->flash(
               'mensagem',
               'Série removida com sucesso' 
            );
          
          return redirect()->route('series.index');  
    }



}
