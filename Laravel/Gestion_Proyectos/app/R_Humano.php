<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class R_Humano extends Model
{
    protected $table='r_humano';
    protected $primaryKey='ID_R_Humano';
    public $timestamps=false;

    # INNER JOIN desde el modelo
    public function EmpleadoRelacion(){
        return $this->belongsTo('App\Empleado','Empleado','ID_Empleado');
    }
}
