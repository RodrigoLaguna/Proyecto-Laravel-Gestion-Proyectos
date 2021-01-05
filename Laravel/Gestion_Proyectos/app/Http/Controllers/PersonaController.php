<?php

namespace App\Http\Controllers;

use App\Clases\Funciones;
use App\Empleado;
use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $empleados=Empleado::
        join('relacion_empleados','relacion_empleados.Empleado_ID','=','empleado.ID_Empleado')
        ->join('persona','relacion_empleados.Persona_ID','=','persona.ID_Persona')
        ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat',
            'persona.Fecha_Nacimiento','empleado.Puesto','empleado.Departamento','persona.Fotografia')->paginate(6);
        return view('Paginas.Personas.index')->with('empleados',$empleados);
    }

    public function create()
    {
        return view('Paginas.Personas.create');
    }

    public function store(Request $request)
    {
       $empleado=request()->only('Departamento','Puesto');
       $persona=request()->only('Nombre','AppelidoPat','AppelidoMat','Fecha_Nacimiento','Fotografia');

        if ($request->hasFile('Fotografia')){
            $file=$request->file('Fotografia');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $persona['Fotografia']=$name;
        }

       Empleado::insert($empleado);
       Persona::insert($persona);

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $empleado=Empleado::
        join('relacion_empleados','relacion_empleados.Empleado_ID','=','empleado.ID_Empleado')
            ->join('persona','relacion_empleados.Persona_ID','=','persona.ID_Persona')
            ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat',
                'persona.Fecha_Nacimiento','empleado.Puesto','empleado.Departamento','persona.Fotografia')
            ->where('empleado.ID_Empleado','=',$id)->first();
        return view('Paginas.Personas.edit')->with('empleado',$empleado);
    }


    public function update(Request $request, $id)
    {
        $empleado=$request->except(['_token','_method']);

        if ($request->hasFile('Fotografia')){
            $file=$request->file('Fotografia');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $empleado['Fotografia']=$name;
        }

        Empleado::
        where('empleado.ID_Empleado','=',$id)
        ->join('relacion_empleados','relacion_empleados.Empleado_ID','=','empleado.ID_Empleado')
            ->join('persona','relacion_empleados.Persona_ID','=','persona.ID_Persona')
            ->select('empleado.ID_Empleado','persona.Nombre','persona.AppelidoPat','persona.AppelidoMat',
                'persona.Fecha_Nacimiento','empleado.Puesto','empleado.Departamento','persona.Fotografia')
            ->update($empleado);
        return redirect()->back();
    }

    public function destroy($ID_Empleado)
    {
        Empleado::destroy($ID_Empleado);
        return redirect()->back();
    }



}
