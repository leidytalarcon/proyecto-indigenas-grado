
@extends('layout')
@section('content')
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="{{ route('comunidad.actualizar',$comunidad->id_comunidad) }}" method="POST" >                  
                    @csrf
                        <div class="header-center">EDITAR COMUNIDAD</div>

                        <div class="card-body">
                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" id="nombre" value="{{ $comunidad['nombre']}}">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">DEPARTAMENTO</label>
                              <input type="text" class="form-control col-md-15" name="departamento" id="departamento" value="{{ $comunidad['departamento']}}">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CIUDAD</label>
                            </div>
                            <input type="text" class="form-control col-md-15" name="ciudad" id="ciudad" value="{{ $comunidad['ciudad']}}">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">TELEFONO REPRESENTANTE</label>
                              <input type="number" class="form-control col-md-15" name="telefono_representante" id="telefono_representante" value="{{ $comunidad['telefono_representante']}}">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE REPRESENTANTE</label>
                              <input type="text" class="form-control col-md-15" name="nombre_representante" id="nombre_representante" value="{{ $comunidad['nombre_representante']}}">
                            </div>
                            <strong>Registrado por</strong>
                            <br>
                            <select name="fk_id_usuario" style="width:500px" id="fk_id_usuario" value="{{ $comunidad['fk_id_usuario']}}">
                                @foreach($usuarios as $usuario){
                                    <option value="{{$usuario['id_usuario']}}">{{$usuario['nombre']}}</option> 
                                }
                                @endforeach
                            </select>
                            <br>

                            <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">Guardar</button>
                            </div>
                        </div>
                           
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
