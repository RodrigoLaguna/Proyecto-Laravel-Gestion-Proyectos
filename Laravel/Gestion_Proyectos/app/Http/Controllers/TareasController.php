<?php

namespace App\Http\Controllers;

use App\Clases\Funciones;
use App\Disponibilidad;
use App\Empleado;
use App\Gestor_Tareas;
use App\Persona;
use App\Proyecto;
use App\R_Humano;
use App\R_Tecnologico;
use App\Relacion_Empleados;
use App\Tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index(){

        $proyectos=Proyecto::all(['Clave','Titulo']);
        return view("Paginas.Tareas.index")->with('proyectos',$proyectos);
    }

    public function visualizar(Request $request){
        $clave=$request->input('Clave');
        $tareas=Tareas::
        join('gestortareas', 'gestortareas.Tarea', '=', 'tareas.Clave')
            ->join('disponibilidad', 'disponibilidad.Recurso', '=', 'gestortareas.Clave')
            ->join('r_humano', 'r_humano.ID_R_Humano', '=', 'gestortareas.R_Humano')
            ->join('r_tecnologico', 'r_tecnologico.ID_R_Tecnologico', '=', 'gestortareas.R_Tecnologico')
            ->join('empleado', 'empleado.ID_Empleado', '=', 'gestortareas.Encargado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('tareas.Clave','tareas.Titulo','tareas.Descripcion','tareas.Duracion_Estimada','tareas.Fecha_inicio',
                'tareas.Progreso','gestortareas.Utilizacion','disponibilidad.Fecha_fin','disponibilidad.HorasXdia',
                'disponibilidad.Dias_trabajados', 'r_humano.Nombre_Recurso','r_tecnologico.Nombre_Recurso as RTec',
                'empleado.Puesto','empleado.Departamento', 'persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->where('tareas.Proyecto', '=', $clave)
            ->get();
        $proyectos=Proyecto::all(['Clave','Titulo']);
        $clave=Proyecto::where('Clave','=',$clave)->first('Titulo');
        return view("Paginas.Tareas.index")->with('proyectos',$proyectos)->with('tareas',$tareas)->with('clave',$clave);
    }

    public function crear(){
        $proyectos=Proyecto::all(['Clave','Titulo']);
        $persona=Empleado::
            join('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->join('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->get();
        $r_humano=R_Humano::all(['ID_R_Humano','Nombre_Recurso']);
        $r_Tecnologico=R_Tecnologico::all();
        return view('Paginas.Tareas.create')->with('proyectos',$proyectos)
            ->with('persona',$persona)->with('r_humano',$r_humano)->with('r_Tecnologico',$r_Tecnologico);
    }

    public function store(Request $request)
    {
        $funcion= new Funciones();
        $proyecto=$request->input('Proyecto');
        $numeroTareas=Tareas::where('Proyecto','=',$proyecto)->count();
        $titulo=$funcion->claveTarea($request->input('Titulo'),$numeroTareas);
        $proyecto=$request->only('Proyecto');
        $disponibilidad=$request->only('Fecha_inicio');

        $tareas=$request->only('Titulo','Descripcion','Duracion_Estimada','Fecha_inicio');
        $gestor_tareas=$request->only('Encargado','R_Humano','R_Tecnologico','Utilizacion');
        Tareas::insert(array_merge($titulo,$proyecto,$tareas));
        Gestor_Tareas::where('Tarea',$titulo)->update($gestor_tareas);

        return redirect()->back();
    }

    public function edit($clave)
    {
        $persona=Empleado::
        join('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->join('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->get();
        $r_humano=R_Humano::all(['ID_R_Humano','Nombre_Recurso']);
        $r_Tecnologico=R_Tecnologico::all();

        $tareas=Tareas::
        join('gestortareas', 'gestortareas.Tarea', '=', 'tareas.Clave')
            ->join('disponibilidad', 'disponibilidad.Recurso', '=', 'gestortareas.Clave')
            ->join('r_humano', 'r_humano.ID_R_Humano', '=', 'gestortareas.R_Humano')
            ->join('r_tecnologico', 'r_tecnologico.ID_R_Tecnologico', '=', 'gestortareas.R_Tecnologico')
            ->join('empleado', 'empleado.ID_Empleado', '=', 'gestortareas.Encargado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('tareas.Clave','tareas.Titulo','tareas.Descripcion','tareas.Duracion_Estimada','tareas.Fecha_inicio',
                'tareas.Progreso','gestortareas.Utilizacion','disponibilidad.Fecha_fin','disponibilidad.HorasXdia',
                'disponibilidad.Dias_trabajados', 'r_humano.ID_R_Humano','r_humano.Nombre_Recurso','r_tecnologico.ID_R_Tecnologico',
                'r_tecnologico.Nombre_Recurso as RTec', 'empleado.ID_Empleado','empleado.Puesto','empleado.Departamento',
                'persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->where('tareas.Clave', '=', $clave)
            ->first();
        $proyectos=Proyecto::join('tareas','proyecto.Clave','=','tareas.Proyecto')
            ->select('proyecto.Clave','proyecto.Titulo')->where('tareas.Clave','=',$clave)->first();
        $clave=Proyecto::where('Clave','=',$clave)->first('Titulo');
        return view("Paginas.Tareas.edit")->with('proyectos',$proyectos)->with('tareas',$tareas)->with('clave',$clave)
            ->with('persona',$persona)->with('r_humano',$r_humano)->with('r_Tecnologico',$r_Tecnologico);
    }

    public function update(Request $request, $id)
    {
        $tarea=$request->only('Titulo','Descripcion','Duracion_Estimada','Fecha_inicio','Progreso');
        $gestor_tareas=$request->only('Encargado','R_Humano','R_Tecnologico','Utilizacion');
        Tareas::where('Clave','=',$id)->update($tarea);
        Gestor_Tareas::where('Tarea','=',$id)->update($gestor_tareas);
        return redirect()->back();

    }

    public function destroy($clave)
    {
        Tareas::destroy($clave);
        $proyectos=Proyecto::all(['Clave','Titulo']);
        return redirect('/tareas')->with('proyectos',$proyectos);
    }


}
