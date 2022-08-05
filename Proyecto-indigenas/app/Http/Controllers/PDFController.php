<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Model\indigena;


class PDFController extends Controller
{
    public function PDF(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');

    }
    public function PDFindigena(){
        $indigenas = indigena::all();
        
        $pdf = PDF::loadView('indigena.pdf.indigena_pdf', compact('indigenas'));

        return $pdf->stream('indigenas.pdf');
    }
}
