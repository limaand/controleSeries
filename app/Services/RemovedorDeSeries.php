<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSeries
{

    public function removerSerie(int $serieId)
    {
        $nomeSerie = '';
        
        DB::transaction(function () use ($serieId ,&$nomeSerie) {
          
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
    
            $serie->temporadas->each(function (Temporada $temporada) {
                $temporada->episodios->each(function (Episodio $episodio) {
                    $episodio->delete();
                });
                $temporada->delete();
            });
    
            $serie->delete();

        }); 
      

        return $nomeSerie;

    }

}
