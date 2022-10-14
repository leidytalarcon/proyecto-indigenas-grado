<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\filtro;
use App\Model\filtro_opcion;
use App\user;

class filtroController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('filtro.filtro_listar');

    }

    public function mapa()
    {
        return view('filtro.filtro_mapa');

    }
   
    public function listar($id_dpto){
        $filtros =filtro::where('NOMBRE', '<>', 'DEPARTAMENTO')->get();
        $filtroDpto =filtro::where('NOMBRE', '=', 'DEPARTAMENTO')->first();
 
        foreach ($filtros as $filtro) {
            $filtro->opciones = filtro_opcion::where('id_filtro', $filtro->ID)->get();
        }

        return view('filtro.filtro_listar', compact('filtros','id_dpto','filtroDpto'));
    }

}
