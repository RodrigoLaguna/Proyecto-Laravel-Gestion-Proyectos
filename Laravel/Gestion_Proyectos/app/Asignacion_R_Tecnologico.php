<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_R_Tecnologico extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function r_tecnologicoRelacion(){
        return $this->belongsTo('App\R_Tecnologico','R_Tec','ID_R_Tecnologico');
    }

    # INNER JOIN desde el modelo
    public function gestorTareasRelacion(){
        return $this->belongsTo('App\Gestor_Tareas','Tarea','Clave');
    }
}
