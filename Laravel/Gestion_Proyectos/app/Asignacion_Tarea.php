<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_Tarea extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function GestorRelacion(){
        return $this->belongsTo('App\Gestor_Tareas','Tarea','Clave');
    }

    # INNER JOIN desde el modelo
    public function EmpleadoRelacion(){
        return $this->belongsTo('App\Empleado','Encargado','ID_Empleado');
    }

}
