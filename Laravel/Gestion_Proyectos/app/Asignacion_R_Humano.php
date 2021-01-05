<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_R_Humano extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function r_humanoRelacion(){
        return $this->belongsTo('App\R_Humano','R_Humano','ID_R_Humano');
    }

    # INNER JOIN desde el modelo
    public function gestorTareasRelacion(){
        return $this->belongsTo('App\Gestor_Tareas','Tarea','Clave');
    }

}
