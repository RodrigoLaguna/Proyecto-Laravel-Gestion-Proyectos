<?php

namespace App\Http\Controllers;

use App\Tareas;
use Illuminate\Http\Request;
use App\Proyecto;

class IndexController extends Controller
{
    public function index(){

        $proyecto=Proyecto::all();
        return view("Paginas.inicio",array("proyecto"=>$proyecto));
    }

}




