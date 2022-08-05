<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\User;
use App\Model\tipo_documento;
use App\Model\rol;
use Curl\Curl;

class usuarioController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('usuario.usuario_listar');

    }
    public function listar(){

        $usuarios = user::all();
        return response()->json($usuarios, 200);
    }

    public function nuevo(){
        $tipos_documento = tipo_documento::all();
        $roles = rol::all();
        return view('usuario.usuario_crear',compact("tipos_documento","roles"));
    }

    public function editar($id_usuario){
        $usuario = user::find($id_usuario);
        $tipos_documento = tipo_documento::all();
        $roles = rol::all();
        return view('usuario.usuario_editar',compact("usuario","tipos_documento","roles")); 
    }

    public function actualizar(Request $request,$id_usuario){
        $usuario = user::find($id_usuario);
        $usuario['documento'] = $request['documento'];
        $usuario['nombre']=$request['nombre'];
        $usuario['telefono'] =$request['telefono'];
        $usuario['email'] =$request['email'];         
       
        $usuario->update();
       
        return redirect()->route('usuario.index');
    }

}