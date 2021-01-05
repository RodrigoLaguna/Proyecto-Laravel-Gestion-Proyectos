<?php

namespace App\Http\Controllers;

use App\Clases\Funciones;
use App\Classes\orquesta;
use App\Empleado;
use App\Gestor_Proyecto;
use App\Persona;
use App\Proyectos_Insert;
use App\ProyectosVista;
use App\Relacion_Empleados;
use App\Tareas;
use Illuminate\Http\Request;
use App\Proyecto;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;


class ProyectosController extends Controller
{

    public function index(){
    $proyecto=Proyecto::all();
    return view("Paginas.inicio",array("proyecto"=>$proyecto));
}

    public function muestra($clave)
    {
        $tareas=Tareas::where('Proyecto','=',$clave)->get();
        $proyectos = Proyecto::
        leftjoin('gestor_proyecto', 'gestor_proyecto.Proyecto', '=', 'proyecto.Clave')
            ->leftjoin('empleado', 'gestor_proyecto.Encargado', '=', 'empleado.ID_Empleado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'relacion_empleados.Persona_ID', '=', 'persona.ID_Persona')
            ->select('proyecto.Clave','proyecto.Titulo','proyecto.Descripcion','proyecto.Fecha_inicio','proyecto.Fecha_final',
                'empleado.Puesto','empleado.Departamento',
                'persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->where('proyecto.Clave', '=', $clave)
            ->first();

        $gantt=Tareas::
        join('gestortareas', 'gestortareas.Tarea', '=', 'tareas.Clave')
            ->join('disponibilidad', 'disponibilidad.Recurso', '=', 'gestortareas.Clave')
            ->join('r_humano', 'r_humano.ID_R_Humano', '=', 'gestortareas.R_Humano')
            ->join('r_tecnologico', 'r_tecnologico.ID_R_Tecnologico', '=', 'gestortareas.R_Tecnologico')
            ->join('empleado', 'empleado.ID_Empleado', '=', 'gestortareas.Encargado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('tareas.Clave','tareas.Titulo','tareas.Descripcion','tareas.Fecha_inicio',
                'tareas.Progreso','disponibilidad.Fecha_fin',
                'r_humano.Nombre_Recurso','r_tecnologico.Nombre_Recurso as RTec')
            ->where('tareas.Proyecto', '=', $clave)
            ->get();

        $duracion=DB::table('tareas')->where('Proyecto','=',$clave)->sum('Duracion_Estimada');

        return view("Paginas.Proyectos.index")->with('proyectos',$proyectos)
            ->with('tareas',$tareas)->with('gantt',$gantt)->with('duracion',$duracion);
    }


    public function create()
    {
        return view('Paginas.Proyectos.create');
    }


    public function store(Request $request)
    {

        $validacion =[
            'Titulo' =>'required|string|max:50',
            'Descripcion' =>'required|string|max:250',
            'Fecha_inicio' =>'required|date',
            'Fecha_final' =>'required|date',
            'Nombre' =>'required|string|max:50',
            'AppelidoPat' =>'required|string|max:50',
            'AppelidoMat' =>'required|string|max:50',
            'Estatus' =>'required|string|max:50',
            'Fecha_Nacimiento' =>'required|date',
            'Fotografia' =>'required|max:10000',
            'Puesto' =>'required|string|max:30',
            'Departamento' =>'required|string|max:30'
        ];
        $mensaje=['required'=>':Attribute requerido'];
        $this->validate($request,$validacion,$mensaje);

        if ($request->hasFile('Fotografia')){
            $file=$request->file('Fotografia');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $persona['Fotografia']=$name;
        }

        $funcion= new Funciones();
        $titulo=$funcion->claveProyecto($request->input('Titulo'));
        $proyecto=$request->only('Titulo','Descripcion','Fecha_inicio','Fecha_final','Estatus');
        $persona=$request->only('Nombre','AppelidoPat','AppelidoMat','Fecha_Nacimiento','Fotografia');
        $empleado=$request->only('Puesto','Departamento');

        Proyecto::insert(array_merge($titulo,$proyecto));
        Empleado::insert($empleado);
        Persona::insert($persona);
        $gestor=Empleado::all('ID_Empleado')->max();
        $clave=$titulo['Clave'];
        Gestor_Proyecto::where('Proyecto',$clave)->update(['Encargado' => $gestor->ID_Empleado]);
        $user= Persona::all()->last()->ID_Persona;
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $tarea = Tareas::where('Proyecto','=',$id)->get();
        $proyecto = Proyecto::
        leftjoin('gestor_proyecto', 'gestor_proyecto.Proyecto', '=', 'proyecto.Clave')
            ->leftjoin('empleado', 'gestor_proyecto.Encargado', '=', 'empleado.ID_Empleado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'relacion_empleados.Persona_ID', '=', 'persona.ID_Persona')
            ->select('proyecto.Clave','proyecto.Titulo','proyecto.Descripcion','proyecto.Fecha_inicio','proyecto.Fecha_final',
                'proyecto.Estatus','proyecto.Progreso',
                'empleado.Puesto','empleado.Departamento',
                'persona.Nombre','persona.AppelidoPat','persona.AppelidoMat','persona.Fecha_Nacimiento')
            ->where('proyecto.Clave', '=', $id)
            ->first();
        return view('Paginas.Proyectos.edit')->with('proyecto', $proyecto)->with('tareas',$tarea);
    }


    public function update(Request $request, $id)
    {
        $validacion =[
            'Titulo' =>'required|string|max:50',
            'Descripcion' =>'required|string|max:250',
            'Fecha_inicio' =>'required|date',
            'Fecha_final' =>'required|date',
            'Nombre' =>'required|string|max:50',
            'AppelidoPat' =>'required|string|max:50',
            'AppelidoMat' =>'required|string|max:50',
            'Fecha_Nacimiento' =>'required|date',
            'Puesto' =>'required|string|max:30',
            'Departamento' =>'required|string|max:30',
            'Progreso' =>'required|numeric|max:100'
        ];

        $mensaje=['required'=>':Attribute requerido'];
        $this->validate($request,$validacion,$mensaje);

        $proyecto=$request->except(['_token','_method']);

        Proyecto::where('proyecto.Clave', '=', $id)->
        leftjoin('gestor_proyecto', 'gestor_proyecto.Proyecto', '=', 'proyecto.Clave')
            ->leftjoin('empleado', 'gestor_proyecto.Encargado', '=', 'empleado.ID_Empleado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'relacion_empleados.Persona_ID', '=', 'persona.ID_Persona')
            ->select('proyecto.Clave','proyecto.Titulo','proyecto.Descripcion','proyecto.Fecha_inicio','proyecto.Fecha_final',
                'proyecto.Estatus','proyecto.Progreso',
                'empleado.Puesto','empleado.Departamento',
                'persona.Nombre','persona.AppelidoPat','persona.AppelidoMat','persona.Fecha_Nacimiento')
            ->update($proyecto);

        return redirect()->back();

    }


    public function destroy($clave)
    {

        Proyecto::destroy($clave);
        return redirect('proyectos')->with('Registro eliminado');
    }



}
