<?php

namespace App\Http\Controllers;

use App\R_Tecnologico;
use Illuminate\Http\Request;

class R_TController extends Controller
{

    public function index()
    {
        $r_tec=R_Tecnologico::all();
        return view('Paginas.R_Tecnologico.index')->with('r_tec',$r_tec);
    }


    public function store(Request $request)
    {
        $r_tec=$request->except('_token');
        R_Tecnologico::insert($r_tec);
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $r_Tecno=R_Tecnologico::where('ID_R_Tecnologico','=',$id)->first();
        return view('Paginas.R_Tecnologico.edit')->with('r_Tecno',$r_Tecno);
    }


    public function update(Request $request, $id)
    {
        $r_tecnologico=$request->except('_token','_method');
        R_Tecnologico::where('ID_R_Tecnologico','=',$id)->update($r_tecnologico);
        return redirect()->back();
    }

    public function destroy($id)
    {
        R_Tecnologico::destroy($id);
        return redirect()->back();
    }
}
