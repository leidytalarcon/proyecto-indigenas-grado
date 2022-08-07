<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\reporte_factor;
use App\user;

class reporte_factorController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('reporte_factor.reporte_factor_listar');

    }
   
    public function listar(){

        $reporte_factor =reporte_factor::all();
        return response()->json($reporte_factor, 200);
    }

    public function nuevo(){
        $usuarios = user::all();
        return view('reporte_factor.reporte_factor', compact('usuarios'));
    }

    public function guardar(Request $request){

       reporte_factor::create([
          'fk_id_reporte'=>$request['fk_id_reporte'],
          'fk_id_factor'=>$request['fk_id_factor'],
          'coeficiente'=>$request['coeficiente']
          
        ]);

        return redirect()->route('reporte_factor.index');
    }

    public function actualizar(Request $request,$id_reporte_factor){
        $reporte_factor = reporte_factor::find($id_reporte_factor);
        $reporte_factor['coeficiente'] =$request['coeficiente'];
        
       
        $reporte_factor->update();
        
        return redirect()->route('reporte_factor.index');

        
    }
}