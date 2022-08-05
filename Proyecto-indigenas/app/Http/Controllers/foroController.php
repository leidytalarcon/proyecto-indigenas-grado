<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\foro;
use App\Model\foro_comentario;
use App\Model\foro_respuesta;

class foroController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('foro.foro_listar');

    }

    public function listar(){

        $foros = foro::all();
        return response()->json($foros, 200);
    }

    public function nuevo(){
        
        return view('foro.foro_crear');
    }

    public function guardar(Request $request){
        
        foro::create([

            'nombre' => $request['nombre'],
            'contenido' => $request['contenido'],
            'fecha_creacion' => date("Y-m-d H:i:s"),
            'fk_id_usuario' => 1
          ]);
          return redirect()->route('foro.index'); 
    }

    public function editar($id_foro){
        $foro = foro::find($id_foro);
        return view('foro.foro_editar',compact('foro')); 
    }

    public function actualizar(Request $request,$id_foro){
        $foro = foro::find($id_foro);
        $foro['nombre'] = $request['nombre'];
        $foro['contenido']=$request['contenido'];
       
        $foro->update();
       
        $foros = foro::all();
        return view('foro.foro_listar',compact('foros')); 
    }

    ////////// COMENTARIOS /////////////////

    public function comentario($id_foro){
        $foro = foro::find($id_foro);
        return view('foro.foro_comentario_listar',compact('foro'));
    }
    public function nuevocomentario($id_foro){
        
        return view('foro.nuevo_comentario_crear',compact('id_foro'));
    }
    
    public function guardar_comentario(Request $request){
        
        foro_comentario::create([

            'comentario' => $request['comentario'],
            'fecha_creacion' => date("Y-m-d H:i:s"),
            'fk_id_foro' => $request['id_foro'],
            'fk_id_usuario' => 1
           
          ]);
          
        $foro = foro::find($request['id_foro']);
        return view('foro.foro_comentario',compact('foro')); 
    }

    /////////// RESPUESTA //////////////////

    public function guardar_respuesta(Request $request){
        
        foro_respuesta::create([   

            'respuesta' => $request['respuesta'],
            'fecha_creacion' => date("Y-m-d H:i:s"),
            'fk_id_comentario'=> $request['id_comentario'],
            'fk_id_usuario'=> 1
           
          ]);
          
          return redirect()->route('foro.comentarios', $request['id_foro']);
    }

    public function eliminar_respuesta($id_respuesta){
        
        $respuesta = foro_respuesta::find($idrespuesta);
        $comentario = foro_comentario::find($respuesta->fk_id_comentario);
        $foro = foro::find($comentario->fk_id_foro);

        $delete = foro_respuesta::destroy($id_respuesta);
          
          return redirect()->route('foro.comentarios', $foro->id_foro);
    }

}