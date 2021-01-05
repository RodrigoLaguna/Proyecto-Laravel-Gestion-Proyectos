<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleado';
    protected $primaryKey='ID_Empleado';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function tasks()
    {
        return $this->hasMany('App\Relacion_Empleados');
    }
}
