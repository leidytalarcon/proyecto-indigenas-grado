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
use Illuminate\Support\Facades\DB;

class reporteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generar(Request $request)
    {

        $selecciones = $request->except('_token');
        dd($selecciones);
        
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

        return view('reporte.reporte_graficar', compact('reporteId'));

    }
    
    public function datosGrafica(Request $request){

        $reporteNombre = $request->reporteNombre;

        $report = reporte::where('NOMBRE', $reporteNombre)->first();

        if(!$report){
            $factores = [];
        }else{
            $factores = reporte_factor::where('ID_REPORTE', $report['ID'])
            ->join('reporte.factor', 'reporte_factor.ID_FACTOR', '=', 'reporte.factor.ID')
            ->orderBy(DB::raw('ABS(COEFICIENTE)'), 'DESC')
            ->skip(0)->take(15)
            ->get();
        }

        $data = $this->generarGrafica($factores);

        return response()->json($data, 200);
    }


    private function generarGrafica($factores){
        $dataList = array();
        $ejeX = 0;
        $ejeY = 50;
        foreach($factores as $factor){
            
            $size = abs($factor['COEFICIENTE']);
            if($size > 9){
                $size = 1;
            }

            $ejeX = $ejeX + ($size*300/2);
            $data['source'] = $factor['ALIAS']; 
            $data['x'] = $ejeX;
            $data['y'] = $ejeY;
            $data['val'] = $size*3000;
            $data['color'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

            array_push($dataList, $data);

            if($ejeX >= 900){
                $ejeX = 0;
                $ejeY = $ejeY + 150;
            }

        }

        return $dataList;
    }

}