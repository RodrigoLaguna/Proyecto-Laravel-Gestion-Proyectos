<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectosVista extends Model
{
    protected $table='detalles_proyecto';
    protected $primaryKey=null;
    public $incrementing=false;
    public $timestamps=false;

    public function scopeOfType($query, $clave)
    {
        return $query->where('Proyecto', $clave);
    }

}
