<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\reporte_factor;
use App\Model\reporte;
use PDF;
use Excel;

class DescargarController extends Controller
{
    public function PDF(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');

    }

    public function PDFreporte($reporteNombre){

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

        return $pdf->stream('REPORTE.pdf');
    }

    public function EXCELreporte($reporteNombre){
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
        $factores = $factores->toArray();
        
        return Excel::create('REPORTE_EXCEL', function($excel) use ($factores) {
            $excel->sheet('FACTORES', function($sheet) use ($factores)
            {
                $sheet->fromArray($factores);
            });
        })->download('xls');

    }
}
