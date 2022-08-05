@extends('layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <form action="{{ route('indigena.actualizar',$indigena['id_indigena']) }}" method="POST">
                    @csrf
                          
                        <div class="header-center">EDITAR INDIGENA</div>

                        <div class="card-body">
                            <div class="form-group col-md-6">
                              <label for=""class="col-12 ">DOCUMENTO</label>
                              <input type="number" class="form-control col-md-15" name="documento" id="docuemnto" value="{{ $indigena['documento']}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" id="nombre" value="{{ $indigena['nombre']}}">
                            </div>
                           
                            <div class="form-group col-md-6">
                              <label for=""class="col-12 col-md-6">FECHA DE NACIMIENTO</label>
                              <input type="date" class="form-control col-md-15" name="nacimiento" 
                              }value="{{ $indigena['Nacimiento']}}"  id="nacimiento" value="{{ $indigena['nacimiento']}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">DIRECCION</label>
                              <input type="text" class="form-control col-md-15" name="direccion"  value="{{ $indigena['direccion']}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">CORREO</label>
                              <input type="email" class="form-control col-md-15" name="correo"  value="{{ $indigena['correo']}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">TELEFONO</label>
                              <input type="number" class="form-control col-md-15" name="telefono"  value="{{ $indigena['telefono']}}">
                            </div>
                      
                            
                            <div class="row form-group col-md-6">
                              <button type="submit" class="btn-success col-md-9 offset-2">AGREGAR</button>
                          </div>
                        
                        </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection