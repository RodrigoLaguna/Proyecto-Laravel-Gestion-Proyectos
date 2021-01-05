<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    protected $table='tareas';
    protected $primaryKey='Clave';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function proyectoRelacion(){
        return $this->belongsTo('App\Proyecto','Proyecto','Clave');
    }

    public static function towns($clave){
        return Tareas::where('Proyecto','=',$clave)->get();
    }

}
