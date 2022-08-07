<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\factor;
use App\user;

class factorController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('factor.factor_listar');

    }
   
    public function listar(){

        $factores =factor::all();
        return response()->json($factores, 200);
    }

    public function editar($id_factor){
        $factor=factor::find($id_factor);
        $usuarios = user::all();
        return view('factor.factor_editar', compact('factor','usuarios'));
    }

    public function actualizar(Request $request,$id_factor){
        $factor = factor::find($id_factor);
        $factor['valor']=$request['valor'];
        $factor['descripcion'] =$request['descripcion'];
        $factor['fecha_creacion'] = $request['fecha_creacion'];
       
        $opcion->update();
        
        return redirect()->route('factor.index');

        
    }
}