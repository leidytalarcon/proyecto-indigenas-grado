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
use App\Model\departamento;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class reporteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generar(Request $request)
    {

        $selecciones = $request->except('_token');
        
        krsort($selecciones);

        Log::info('FILTROS: '.implode(", ", $selecciones));

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

        Log::info('REPORTE: '.$reporteId);
        $data = $this->datosGrafica($reporteId);

        return response()->json($data, 200);

    }
    
    public function datosGrafica($reporteNombre){

        Log::info('NAME: '.$reporteNombre);
        $report = reporte::where('NOMBRE', $reporteNombre)->first();

        if(!$report){
            $factores = [];
            Log::info('VACIO: '.$reporteNombre);
        }else{
            $factores = reporte_factor::where('ID_REPORTE', $report['ID'])
            ->join('reporte.factor', 'reporte_factor.ID_FACTOR', '=', 'reporte.factor.ID')
            ->orderBy(DB::raw('ABS(COEFICIENTE)'), 'DESC')
            ->skip(0)->take(15)
            ->get();
        }

        $data = $this->generarGrafica($factores);

        return $data;
    }


    private function generarGrafica($factores){
        $dataList = array();
        foreach($factores as $factor){
            
            $size = abs($factor['COEFICIENTE']);
            if ($size>10){
                $size = 1;
            }

            $data['source'] = $factor['ALIAS']; 
            $data['valor'] = $size;
            $data['color'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

            array_push($dataList, $data);

        }

        return $dataList;
    }

    public function generarMapa(){
        
        $departamentos = departamento::all();

        return view('reporte.reporte_mapa', compact('departamentos'));

    }

    public function generarPowerBi($idDpto){
        
        $urlReporte = departamento::find($idDpto);

        return view('reporte.reporte_power_bi', compact('urlReporte'));

    }

}