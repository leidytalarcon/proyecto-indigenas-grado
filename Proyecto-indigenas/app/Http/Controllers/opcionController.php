<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\opcion;
use App\user;

class opcionController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('opcion.opcion_listar');

    }
   
    public function listar(){

        $opcion =opcion::all();
        return response()->json($opcion, 200);
    }

    public function nuevo(){
        $usuarios = user::all();
        return view('opcion.opcion_crear', compact('usuarios'));
    }

    public function guardar(Request $request){

        comunidad::create([
            'valor' =>$request['valor'],
            'descripcion' =>$request['descripcion'],
            'fecha_creacion' =>$request['fecha_creacion'],
            'fk_id_filtro'=>$request['fk_id_filtro'],
            'fk_id_usuario'=>$request['fk_id_usuario']
        ]);

        return redirect()->route('opcion.index');
    }

    public function editar($id_opcion){
        $opcion=opcion::find($id_opcion);
        $usuarios = user::all();
        return view('opcion.opcion_editar', compact('opcion','usuarios'));
    }

    public function actualizar(Request $request,$id_opcion){
        $opcion = opcion::find($id_opcion);
        $opcion['valor']=$request['valor'];
        $opcion['descripcion'] =$request['descripcion'];
        $opcion['fecha_creacion'] = $request['fecha_creacion'];
       
        $opcion->update();
        
        return redirect()->route('opcion.index');

        
    }
}