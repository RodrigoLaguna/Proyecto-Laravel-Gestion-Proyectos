<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='ID_Persona';
    public $timestamps=false;

    public function tasks()
    {
        return $this->hasMany('App\Relacion_Empleados');
    }
}
