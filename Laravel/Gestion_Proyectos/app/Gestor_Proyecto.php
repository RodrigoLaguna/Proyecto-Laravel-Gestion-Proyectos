<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestor_Proyecto extends Model
{
    protected $table='gestor_proyecto';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function proyectoRelacion(){
        return $this->belongsTo('App\Empleado','Encargado','ID_Empleado');
    }
}
