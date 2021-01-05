<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Tareas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class pdfController extends Controller
{
    public function exportPDF($clave){

        $proyecto = Proyecto::
        leftjoin('gestor_proyecto', 'gestor_proyecto.Proyecto', '=', 'proyecto.Clave')
            ->leftjoin('empleado', 'gestor_proyecto.Encargado', '=', 'empleado.ID_Empleado')
            ->leftjoin('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->leftjoin('persona', 'relacion_empleados.Persona_ID', '=', 'persona.ID_Persona')
            ->select('proyecto.Clave','proyecto.Titulo','proyecto.Descripcion','proyecto.Fecha_inicio','proyecto.Fecha_final',
                'proyecto.Estatus','proyecto.Progreso',
                'empleado.Puesto','empleado.Departamento',
                'persona.Nombre','persona.AppelidoPat','persona.AppelidoMat','persona.Fecha_Nacimiento')
            ->where('proyecto.Clave', '=', $clave)
            ->first();
//
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
            ->where('tareas.Proyecto', '=', $clave)
            ->get();

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

        $data = [
            'proyecto' => $proyecto,
            'tareas' => $tareas,
            'gantt' => $gantt
            ];

        //return view('Paginas.pdf_upload')->with('proyecto',$proyecto)->with('tareas',$tareas);
        $pdf = PDF::loadView('Paginas.pdf_upload',$data);

        return $pdf->stream('medium.pdf');
    }
}
