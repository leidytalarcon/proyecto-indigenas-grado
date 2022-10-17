<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\reporte_factor;
use App\Model\reporte;
use App\Model\filtro;
use PDF;
use App\Exports\ReporteExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class DescargarController extends Controller
{

    public function PDFreporte(Request $request){

        $reporteNombre = $this->obtenerReporte($request);

        if(!$reporteNombre){
            $factores = [];
            $report = '';
        }else{
            $report = reporte::where('NOMBRE', $reporteNombre)->first();

            $factores = reporte_factor::where('ID_REPORTE', $report['ID'])
            ->join('reporte.factor', 'reporte_factor.ID_FACTOR', '=', 'reporte.factor.ID')
            ->orderBy(DB::raw('ABS(COEFICIENTE)'), 'DESC')
            ->get();
        }
        

        $pdf = PDF::loadView('reporte.reporte_listar', compact('factores','report'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('REPORTE.pdf');
    }

    public function EXCELreporte(Request $request){

        $reporteNombre = $this->obtenerReporte($request);
        
        return Excel::download(new ReporteExport($reporteNombre), 'REPORTE_EXCEL.xls');

    }

    public function obtenerReporte(Request $request)
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

        Log::info('REPORTE DESCARGAR: '.$reporteId);

        return $reporteId;

    }
}
