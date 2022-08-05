@extends('layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <div class="section-title">
                    <h2>AGREGAR INDIGENA</h2>
                    <p></p>
                  </div>

                  <form action="/indigena/guardar" id="indigenaForm" method="POST">
                    @csrf
                        <div class="header-center"> </div>

                        <div class="row">

                            @if($errors->any())
                              <div class="alert alert-warning" role="alert">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                              </div>
                            @endif
                            <br>  

                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">DOCUMENTO</label>
                              <input type="number" class="form-control col-md-15" name="documento" placeholder="Ingrese documento">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" placeholder="digite el nombre">
                            </div>
                  
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">FECHA DE NACIMIENTO</label>
                              <input type="date" class="form-control col-md-15" name="nacimiento" placeholder="fecha de nacimiento">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">DIRECCION</label>
                              <input type="text" class="form-control col-md-15" name="direccion" placeholder="direccion">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">CORREO</label>
                              <input type="email" class="form-control col-md-15" name="correo" placeholder="ingrese su correo">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">TELEFONO</label>
                              <input type="number" class="form-control col-md-15" name="telefono" placeholder="ingrese su numero" required>
                            </div>
                            <br>
                            <strong>COMUNIDAD:</strong>
                            <br>
                            <select name="fk_id_comunidad" style="width:500px"  >
                                    @foreach($comunidades as $comunidad)
                                        <option value="{{$comunidad['id_comunidad']}}">{{$comunidad["nombre"]}}</option> 
                                    @endforeach
                            </select>

                            <br>
                            <strong>TIPO_DOCUMENTO:</strong>
                            <br>
                            <select name="fk_id_tipo_documento" style="width:500px"  >
                                    @foreach($tipo_documentos as $tipo_documento)
                                        <option value="{{$tipo_documento['id_tipo_documento']}}">{{$tipo_documento["nombre"]}}</option> 
                                    @endforeach
                            </select>
                            <br>
                            
                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">AGREGAR</button>
                            </div>
                        </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <script type="text/javascript">
      
      jQuery(document).ready(function () {//clasesin

        $.validator.addMethod("letrasEspacios",function(value) {
                return false;
              },"Solo puede ingresar letras y espacios"
        );

        $("#userForm").validate({
              rules: {
                documento:{
                  required:true,
                  min: 5
                },
                nombre : {
                  required: true,
                  letrasEspacios: true
                },
               
                direccion:{
                  required:true,
                  min:6
                },
                email:{
                  required:true,
                  email: true
                },
                telefono:{
                  required:true,
                  min: 5
                },

               
              },
              messages : {
               
                documento: {
                  required: "El documento es obligatorio",
                  min: "Debe contener minimo 5 digitos"
                },
                nombre: {
                  required: "El nombre es obligatorio"
                },
                direccion: {
                  required: "La direccion es obligatorio"
                },
                email: {
                  required: "El email es obligatorio",
                  email: "debe contener @ y terminar en .com"
                },
                telefono: {
                  required: "El telefono es obligatorio",
                  number: "Solo puede ingresar números"
                },
                
               
               
              }
            });
    
            
            });
    
        });
    
       
    </script>