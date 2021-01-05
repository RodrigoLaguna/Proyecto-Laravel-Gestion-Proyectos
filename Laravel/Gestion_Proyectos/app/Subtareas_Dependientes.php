<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtareas_Dependientes extends Model
{
    protected $table='subtareas_dependientes';
    protected $primaryKey='ID_Dependencia';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function SubtareasRelacion(){
        return $this->belongsTo('App\Subtareas','Subtarea','Clave');
    }

    # INNER JOIN desde el modelo
    public function SubtareasDepRelacion(){
        return $this->belongsTo('App\Subtareas','Dependencia','Clave');
    }
}
