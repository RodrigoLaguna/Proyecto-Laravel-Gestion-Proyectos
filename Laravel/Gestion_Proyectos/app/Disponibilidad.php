<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $table='disponibilidad';
    protected $primaryKey='ID_Disponibilidad';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function GestorRelacion(){
        return $this->belongsTo('App\Gestor_Tareas','Recurso','Clave');
    }

}
