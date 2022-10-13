<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Model\reporte_factor;
use App\Model\reporte;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReporteExport implements FromCollection, WithHeadings
{
    private $reporteNombre;

    public function __construct(String $reporteNombre) 
    {
        $this->reporteNombre = $reporteNombre;
    }

    public function headings():array{
        return[
            'ID',
            'FACTOR',
            'COEFICIENTE'
        ];
    } 

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if(!$this->reporteNombre){
            $factores = [];
        }else{
            $report = reporte::where('NOMBRE', $this->reporteNombre)->first();

            $factores = reporte_factor::where('ID_REPORTE', $report['ID'])
            ->join('reporte.factor', 'reporte_factor.ID_FACTOR', '=', 'reporte.factor.ID')
            ->orderBy(DB::raw('ABS(COEFICIENTE)'), 'DESC')
            ->get(['ID_FACTOR','ALIAS','COEFICIENTE']);
        }
        
        return $factores;
    }
}
