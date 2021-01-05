<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tareas_Dependientes extends Model
{
    protected $table='tareas_dependientes';
    protected $primaryKey='ID_Dependencia';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function TareasRelacion(){
        return $this->belongsTo('App\Tareas','Tarea','Clave');
    }

    # INNER JOIN desde el modelo
    public function TareasDepRelacion(){
        return $this->belongsTo('App\Tareas','Dependencia','Clave');
    }
}
