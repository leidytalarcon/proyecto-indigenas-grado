@extends('layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <form action="{{ route('foro.actualizar',$foro->id_foro) }}" method="POST">
                    @csrf
                          
                        <div class="header-center">EDITAR foro</div>

                        <div class="card-body">
                            
                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" value="{{ $foro['nombre']}}"  placeholder="digite el nombre">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CONTENIDO</label>
                              <textarea id="contenido" rows="10" cols="70" class="form-control col-md-15" name="contenido" placeholder="digite contenido">{{ $foro['contenido'] }}</textarea>
                            </div>
                            
                            <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">AGREGAR</button>
                            </div>
                            <br>
                        
                        </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection