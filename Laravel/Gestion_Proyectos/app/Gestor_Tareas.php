<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestor_Tareas extends Model
{
    protected $table='gestortareas';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function TareaRelacion(){
        return $this->belongsTo('App\Tareas','Tarea','Clave');
    }
}
