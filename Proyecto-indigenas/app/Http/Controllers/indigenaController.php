<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\indigena;
use App\Model\comunidad;
use App\Model\tipo_documento;
use Curl\Curl;
use Validator;

class indigenaController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('indigena.indigena_listar');

    }
    public function listar(){

        $indigenas = indigena::all();
        return response()->json($indigenas, 200);
    }

    public function editar($id_indigena){
        $indigena = indigena::find($id_indigena);
        return view('indigena.indigena_editar',compact('indigena')); 
    }

    public function nuevo(){
        $comunidades = comunidad::all();
        $tipo_documentos= tipo_documento::all();
        
        return view('indigena.indigena_crear',compact("comunidades","tipo_documentos"));
    }

    public function guardar(Request $request){

        $validatedData = Validator::make($request->all(), [
            'documento' => 'required|unique:indigena|max:10',
            'nombre' => 'required|alpha_dash|max:50',
            'correo' => 'required|unique:indigena|',
            'telefono' => 'required|alpha_dash|max:50'

        ]);

        if ($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData->errors());
        }

        indigena::create([

            'documento' => $request['documento'],
            'nombre' => $request['nombre'],
            'nacimiento' => $request['nacimiento'],
            'direccion' =>$request['direccion'],
            'correo' =>$request['correo'],
            'telefono' =>$request['telefono'],
            'fk_id_comunidad'  =>$request['fk_id_comunidad'],
            'fk_id_tipo_documento'  =>$request['fk_id_tipo_documento'],
            'fk_id_usuario' => 1

          ]);
          return view('indigena.indigena_listar'); 
    }

    public function actualizar(Request $request,$id_indigena){
        
        $validatedData = Validator::make($request->all(), [
            'documento' => 'required|max:10',
            'nombre' => 'required|alpha_dash|max:50',
            'correo' => 'required|unique:indigena|',
            'telefono' => 'required|alpha_dash|max:50'

        ]);

        if ($validatedData->fails())
        {
            return redirect()->back()->withInput()->withErrors($validatedData->errors());
        }

        $indigena = indigena::find($id_indigena);
        $indigena['documento'] = $request['documento'];
        $indigena['nombre']=$request['nombre'];
        $indigena['nacimiento'] =$request['nacimiento'];
        $indigena['direccion'] =$request['direccion'];
        $indigena['telefono'] =$request['telefono'];
        $indigena['fk_id_comunidad'] =$request['fk_id_comunidad'];
        $indigena['fk_id_tipo_documento'] =$request['fk_id_tipo_documento'];
     

        $indigena->update();
    
          $indigena = indigena::all();

          return view('indigena.indigena_listar',compact('indigena')); 
    }

}