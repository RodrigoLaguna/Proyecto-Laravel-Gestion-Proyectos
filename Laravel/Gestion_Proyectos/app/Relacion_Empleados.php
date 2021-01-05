<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relacion_Empleados extends Model
{
    protected $table='relacion_empleados';
    protected $primaryKey=null;
    public $timestamps=false;

    public function personaRelacion(){
        return $this->hasMany('App\Persona','Persona_ID','ID_Persona');
    }

    public function empleadoRelacion(){
        return $this->hasMany('App\Empleado','Empleado_ID','ID_Empleado');
    }
}
