<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtareas extends Model
{
    protected $table='subtareas';
    protected $primaryKey='Clave';
    protected $keyType='string';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function TareasRelacion(){
        return $this->belongsTo('App\Tareas','Tarea','Clave');
    }


}
