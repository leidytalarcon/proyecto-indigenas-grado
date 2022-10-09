<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\reporte;
use App\Model\reporte_factor;
use App\Model\filtro_opcion;
use App\Model\filtro;
use App\user;

class reporteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generar(Request $request)
    {

        
        $selecciones = $request->except('_token');

        krsort($selecciones);

        $reporteId = '';
        $factorOrder = ['', '', ''];

        foreach ($selecciones as $filtroId => $opcionId) {
            
            $filtro = filtro::where('ID', $filtroId)->first();
      
            if($filtro['NOMBRE'] == 'DEPARTAMENTO'){
                $factorOrder[0] = $filtro['NOMBRE'] . $opcionId;
            }
            if($filtro['NOMBRE'] == 'RANGO EDAD'){
                $factorOrder[1] = $filtro['NOMBRE'] . $opcionId;
            }
            if($filtro['NOMBRE'] == 'GENERO'){
                $factorOrder[2] = $filtro['NOMBRE'] . $opcionId;
            }
            
        }
        $reporteId = $factorOrder[0] . $factorOrder[1] . $factorOrder[2];

        $report = reporte::where('NOMBRE', $reporteId)->first();

        if(!$report){
            $factores = [];
        }else{
            $factores = reporte_factor::where('ID_REPORTE', $report['ID'])
            ->join('reporte.factor', 'reporte_factor.ID_FACTOR', '=', 'reporte.factor.ID')
            ->get();
        }

        return view('reporte.reporte_listar', compact('factores','report'));

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