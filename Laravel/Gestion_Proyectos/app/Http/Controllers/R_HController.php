<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Persona;
use App\R_Humano;
use Illuminate\Http\Request;

class R_HController extends Controller
{

    public function index()
    {
        $r_humano=R_Humano::join('empleado','r_humano.Empleado','=','empleado.ID_Empleado')
            ->join('relacion_empleados','relacion_empleados.Empleado_ID','=','empleado.ID_Empleado')
            ->join('persona','relacion_empleados.Persona_ID','=','persona.ID_Persona')
            ->select('r_humano.ID_R_Humano','r_humano.Nombre_Recurso','persona.Nombre','persona.AppelidoPat',
                'persona.AppelidoMat','empleado.Puesto','empleado.Departamento')->get();
        return view('Paginas.R_Humano.index')->with('r_humano',$r_humano);
    }


    public function create()
    {
        $persona=Empleado::
        join('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->join('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->get();
        return view('Paginas.R_Humano.create')->with('persona',$persona);
    }


    public function store(Request $request)
    {
        $r_humano = $request->only('Nombre_Recurso');
        $empleado=$request->only('Puesto','Departamento');
        $persona=$request->only('Nombre','AppelidoPat','AppelidoMat','Fecha_Nacimiento');
        Empleado::insert($empleado);
        Persona::insert($persona);
        $gestor=Empleado::all('ID_Empleado')->max();

        R_Humano::insert(array_merge($r_humano,['Empleado' => $gestor->ID_Empleado]));

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $r_humano=R_Humano::join('empleado','r_humano.Empleado','=','empleado.ID_Empleado')
            ->join('relacion_empleados','relacion_empleados.Empleado_ID','=','empleado.ID_Empleado')
            ->join('persona','relacion_empleados.Persona_ID','=','persona.ID_Persona')
            ->select('r_humano.ID_R_Humano','r_humano.Nombre_Recurso','persona.Nombre','persona.AppelidoPat',
                'persona.AppelidoMat','empleado.ID_Empleado')
            ->where('ID_R_Humano','=',$id)->first();
        $persona=Empleado::
        join('relacion_empleados', 'relacion_empleados.Empleado_ID', '=', 'empleado.ID_Empleado')
            ->join('persona', 'persona.ID_Persona', '=', 'relacion_empleados.Persona_ID')
            ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat')
            ->get();
        return view('Paginas.R_Humano.edit')->with('r_humano',$r_humano)->with('persona',$persona);
    }


    public function update(Request $request, $id)
    {
        $r_humano=$request->except(['_token','_method']);
        R_Humano::where('ID_R_Humano','=',$id)->update($r_humano);
        return redirect()->back();
    }


    public function destroy($id)
    {
        R_Humano::destroy($id);
        return redirect()->back();
    }
}
