<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\comunidad;
use App\user;

class comunidadController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('comunidad.comunidad_listar');

    }
   
    public function listar(){

        $comunidades =comunidad::all();
        return response()->json($comunidades, 200);
    }

    public function nuevo(){
        $usuarios = user::all();
        return view('comunidad.comunidad_crear', compact('usuarios'));
    }

    public function guardar(Request $request){

        comunidad::create([
            'nombre' =>$request['nombre'],
            'departamento' =>$request['departamento'],
            'ciudad' =>$request['ciudad'],
            'telefono_representante'=>$request['telefono_representante'],
            'nombre_representante'=>$request['nombre_representante'],
            'fk_id_usuario'=>$request['fk_id_usuario']
        ]);

        return redirect()->route('comunidad.index');
    }

    public function editar($id_comunidad){
        $comunidad=comunidad::find($id_comunidad);
        $usuarios = user::all();
        return view('comunidad.comunidad_editar', compact('comunidad','usuarios'));
    }

    public function actualizar(Request $request,$id_comunidad){
        $comunidad = comunidad::find($id_comunidad);
        $comunidad['nombre']=$request['nombre'];
        $comunidad['departamento'] =$request['departamento'];
        $comunidad['ciudad'] = $request['ciudad'];
        $comunidad['telefono_representante'] =$request['telefono_representante'];
        $comunidad['nombre_representante'] =$request['nombre_representante'];

        $comunidad->update();
        
        return redirect()->route('comunidad.index');

        
    }
}