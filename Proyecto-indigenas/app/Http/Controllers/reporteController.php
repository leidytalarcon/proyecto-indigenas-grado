<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\reporte;
use App\user;

class reporteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('reporte.reporte_listar');

    }
   
    public function listar(){

        $reporte =reporte::all();
        return response()->json($reporte, 200);
    }

    public function nuevo(){
        $usuarios = user::all();
        return view('reporte.reporte', compact('usuarios'));
    }

    public function guardar(Request $request){

        comunidad::create([
          
            'respuesta' =>$request['respuesta'],
            'fecha_creacion' =>$request['fecha_creacion'],
            'fk_id_usuario'=>$request['fk_id_usuario']
        ]);

        return redirect()->route('reporte.index');
    }

    public function actualizar(Request $request,$id_reporte){
        $reporte = reporte::find($id_reporte);
        $reporte['respuesta'] =$request['respuesta'];
        $reporte['fecha_creacion'] = $request['fecha_creacion'];
       
        $reporte->update();
        
        return redirect()->route('reporte.index');

        
    }
}