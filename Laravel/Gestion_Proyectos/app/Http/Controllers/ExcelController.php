<?php

namespace App\Http\Controllers;

use App\Tareas;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function exportExcel($clave)
    {
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

        return view('Paginas.excel')->with('tareas',$tareas);
    }
}
