<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\reporte_factor;
use App\Model\reporte;
use PDF;


class PDFController extends Controller
{
    public function PDF(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');

    }

    public function PDFreporte($reportId){
        if(!$reportId){
            $factores = [];
            $report = '';
        }else{
            $report = reporte::where('ID', $reportId)->first();

            $factores = reporte_factor::where('ID_REPORTE', $reportId)
            ->join('reporte.factor', 'reporte_factor.ID_FACTOR', '=', 'reporte.factor.ID')
            ->get();
        }
        

        $pdf = PDF::loadView('reporte.reporte_listar', compact('factores','report'));

        return $pdf->stream('REPORTE.pdf');
    }
}
