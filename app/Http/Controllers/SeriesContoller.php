<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesContoller extends Controller
{
    //

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


    public function store(SeriesFormRequest $request){
      
     

       $serie = Serie::create([
         'nome' => $request->nome
       ]);

       


       $request->session()->flash(
           'mensagem', 
           "Série #($serie->id) criada com sucesso ($serie->nome)" 
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
