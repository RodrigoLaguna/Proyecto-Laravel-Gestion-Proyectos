<?php

namespace App\Http\Controllers;

use App\Clases\Funciones;
use App\Proyecto;
use App\Subtareas;
use App\Tareas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubtareasController extends Controller
{

    public function index()
    {
        $proyectos = Proyecto::all('Clave','Titulo');
        $subtareas=Subtareas::join('tareas','tareas.Clave','=','subtareas.Tarea')
        ->select('subtareas.Clave','subtareas.Titulo','subtareas.Descripcion','subtareas.Duracion','subtareas.Fecha_inicio',
            'tareas.Titulo as Tarea','tareas.Progreso')
            ->get();
        return view('Paginas.Subtareas.index')->with('proyectos',$proyectos);
    }

    public function visualizar(Request $request){

        $clave=$request->input('Clave');
        $subtareas=Subtareas::join('tareas','tareas.Clave','=','subtareas.Tarea')
            ->join('proyecto','proyecto.Clave','=','tareas.Proyecto')
            ->select('subtareas.Clave','subtareas.Titulo','subtareas.Descripcion','subtareas.Duracion','subtareas.Fecha_inicio',
                'tareas.Titulo as Tarea','tareas.Progreso')
            ->where('tareas.Proyecto','=',$clave)
            ->get();
        $proyectos=Proyecto::all(['Clave','Titulo']);

        return view("Paginas.Subtareas.index")->with('proyectos',$proyectos)->with('subtareas',$subtareas);
    }

    public function create()
    {
        $proyectos = Proyecto::all('Titulo','Clave');
        return view('Paginas.Subtareas.create')->with('proyectos',$proyectos);
    }

    public function getTareas($clave)
    {
        return Tareas::where('Proyecto','=',$clave)->get();
    }


    public function store(Request $request)
    {
        $funcion = new Funciones();
        $tarea=$request->input('Tarea');
        $numeroTareas=Subtareas::where('Tarea','=',$tarea)->count();
        $clave=$funcion->claveSubTarea($request->input('Proyecto'),$numeroTareas);
        $subtarea = $request->except('_token','Proyecto');
        Subtareas::insert(array_merge($clave,$subtarea));

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($clave)
    {
      $subtarea = Subtareas::join('tareas','subtareas.Tarea','=','tareas.Clave')
                            ->join('proyecto','tareas.Proyecto','=','proyecto.Clave')
                            ->select('subtareas.Clave','subtareas.Titulo','subtareas.Descripcion','subtareas.Duracion',
                                'subtareas.Fecha_inicio','tareas.Titulo as Tarea','proyecto.Titulo as Proyecto')
                            ->where('subtareas.Clave','=',$clave)->first();
      return view('Paginas.Subtareas.edit')->with('subtarea',$subtarea);
    }


    public function update(Request $request, $id)
    {
        $subtarea = $request->except('_token','_method');
        Subtareas::where('Clave',$id)->update($subtarea);
        return redirect()->back();
    }


    public function destroy($id)
    {
        Subtareas::destroy($id);
        $proyectos = Proyecto::all('Clave','Titulo');
        $subtareas=Subtareas::join('tareas','tareas.Clave','=','subtareas.Tarea')
            ->select('subtareas.Clave','subtareas.Titulo','subtareas.Descripcion','subtareas.Duracion','subtareas.Fecha_inicio',
                'tareas.Titulo as Tarea','tareas.Progreso')
            ->get();
        return view('Paginas.Subtareas.index')->with('proyectos',$proyectos);
    }

}
