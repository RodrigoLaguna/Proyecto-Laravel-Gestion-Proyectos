<?php


namespace App\Clases;
use http\Env\Request;
use Illuminate\Support\Collection as Collection;
use PhpParser\Node\Expr\Array_;

class Funciones
{
    public function claveProyecto($titulo)
    {
        $titulo=strtoupper($titulo);
        $titulo=substr($titulo,0,4);
        return array('Clave'=> 'PROAPP'.$titulo);
    }

    public function claveTarea($titulo,$numTareas)
    {
        $titulo=strtoupper($titulo);
        $titulo=substr($titulo,0,3);
        $numTareas+=1;
        if ($numTareas >= 0 && $numTareas < 10){
            return array('Clave'=> 'TSIS'.$titulo.'00'.$numTareas);
        }elseif ($numTareas >= 10 && $numTareas < 100){
            return array('Clave'=> 'TSIS'.$titulo.'0'.$numTareas);
        }else{
            return array('Clave'=> 'TSIS'.$titulo.$numTareas);
        }

    }

    public function lada($telefono)
    {
        $lada="+52";
        $lada .=$telefono;
        return $lada;
    }

    public function claveSubTarea($titulo,$numSubTareas)
    {
        $titulo=strtoupper($titulo);
        $titulo=substr($titulo,0,3);
        $numSubTareas+=1;
        if ($numSubTareas >= 0 && $numSubTareas < 10){
            return array('Clave'=> 'SSIS'.$titulo.'00'.$numSubTareas);
        }elseif ($numSubTareas >= 10 && $numSubTareas < 100){
            return array('Clave'=> 'SSIS'.$titulo.'0'.$numSubTareas);
        }else{
            return array('Clave'=> 'SSIS'.$titulo.$numSubTareas);
        }

    }
}
