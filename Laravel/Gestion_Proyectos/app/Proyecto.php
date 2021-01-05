<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table='proyecto';
    protected $primaryKey='Clave';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;

    public function tasks()
    {
        return $this->hasMany('App\Tareas');
    }



}
