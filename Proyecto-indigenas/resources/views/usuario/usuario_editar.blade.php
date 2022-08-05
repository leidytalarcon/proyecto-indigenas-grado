@extends('layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <form action="{{ route('usuario.actualizar',$usuario['id_usuario']) }}" method="POST">
                    @csrf
                          
                        <div class="header-center">EDITAR USUARIO</div>

                        <div class="card-body">
                            <div class="form-group col-md-6">
                              <label for=""class="col-12 ">DOCUMENTO</label>
                              <input type="number" class="form-control col-md-15" name="documento" id="docuemnto" value="{{ $usuario['documento']}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" id="nombre" value="{{ $usuario['nombre']}}">
                            </div>
                         
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">TELEFONO</label>
                              <input type="text" class="form-control col-md-15" name="telefono"  value="{{ $usuario['telefono']}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">CORREO</label>
                              <input type="email" class="form-control col-md-15" name="email"  value="{{ $usuario['email']}}">
                            </div>
                      
                            <br>
                            <strong>TIPO DOCUMENTO:</strong>
                            <br>
                            <select name="fk_id_tipo_documento" id="fk_id_tipo_documento" style="width:500px"  >
                                    @foreach($tipos_documento as $tipo_documento)
                                        <option value="{{$tipo_documento['id_tipo_documento']}}">{{$tipo_documento["nombre"]}}</option> 
                                    @endforeach
                            </select>
                            <br>
                            <strong>ROL:</strong>
                            <br>
                            <select name="fk_id_rol" id="fk_id_rol" style="width:500px"  >
                                    @foreach($roles as $rol)
                                        <option value="{{$rol['id_rol']}}">{{$rol["nombre"]}}</option> 
                                    @endforeach
                            </select>
                            <div class="row form-group col-md-6">
                              <button type="submit" class="btn-success col-md-9 offset-2">EDITAR</button>
                          </div>
                        
                        </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection