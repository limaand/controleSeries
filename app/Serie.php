<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //
    protected $table = 'series';

    protected $fillable = ['nome'];
    
    //seriextemporas 1:n
    public function temporadas(){
       return $this->hasMany(Temporada::class);        
    }    
}
