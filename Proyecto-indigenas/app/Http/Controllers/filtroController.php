<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\filtro;
use App\user;

class filtroController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('filtro.filtro_listar');

    }
   
    public function listar(){

        $filtro =filtro::all();
        return response()->json($filtro, 200);
    }

    public function nuevo(){
        $usuarios = user::all();
        return view('filtro.filtro_crear', compact('usuarios'));
    }

    public function guardar(Request $request){

        comunidad::create([
            'nombre' =>$request['nombre'],
            'contenido' =>$request['contenido'],
            'fecha_creacion' =>$request['fecha_creacion'],
            'fk_id_usuario'=>$request['fk_id_usuario']
            
        ]);

        return redirect()->route('filtro.index');
    }

    public function editar($id_filtro){
        $filtro=filtro::find($id_filtro);
        $usuarios = user::all();
        return view('filtro.filtro_editar', compact('filtro','usuarios'));
    }

    public function actualizar(Request $request,$id_filtro){
        $filtro = filtro::find($id_filtro);
        $filtro['nombre']=$request['nombre'];
        $filtro['contenido'] =$request['contenido'];
        $filtro['fecha_creacion'] = $request['fecha_creacion'];
       
        $factor->update();
        
        return redirect()->route('factor.index');

        
    }
}
