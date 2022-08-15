
@extends('layout')
@section('content')
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="/comunidad/guardar" di="comunidadForm" method="POST" >                  
                    @csrf
                        <div class="header-center">AGREGAR COMUNIDAD </div>

                        <div class="card-body">
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" id="nombre">
                            </div>
                            <div class="form-group col-md-6 ">
                              <label for=""class="col-12">DEPARTAMENTO</label>
                              <input type="text" class="form-control col-md-15" name="departamento" id="departamento">
                            </div>
                            <div class="form-group  col-md-6">
                              <label for=""class="col-12">CIUDAD</label>
                              <input type="text" class="form-control col-md-15" name="ciudad" id="ciudad">
                            </div>
                            <div class="form-group  col-md-6">
                              <label for=""class="col-12">TELEFONO REPRESENTANTE</label>
                              <input type="number" class="form-control col-md-15" name="telefono_representante" id="telefono_representante">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-12">NOMBRE REPRESENTANTE</label>
                              <input type="text" class="form-control col-md-15" name="nombre_representante" id="nombre_representante">
                            </div>
                            <strong>Registrado por</strong>
                            <br>
                            <select name="fk_id_usuario" style="width:500px" id="fk_id_usuario">
                                @foreach($usuarios as $usuario){
                                    <option value="{{$usuario['id_usuario']}}">{{$usuario['nombre']}}</option> 
                                }
                                @endforeach
                            </select>
                            <br>
                            <div class="row form-group group col-md-6">
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
                return /^[a-zA-Z\s]*$/.test(value);
              },"Solo puede ingresar letras y espacios"
        );

        $("#comunidadForm").validate({
              rules: {
                nombre : {
                  required: true,
                  letrasEspacios: true
                },
                departamento:{
                  required:true,
                  min: 5
                },
                ciudad:{
                  required:true,
                  min: 5
                },
                telefono_representante:{
                  required:true,
                  number: true
                },
                nombre_representante : {
                  required: true,
                  letrasEspacios: true
                },
               
              },
              messages : {
                nombre: {
                  required: "El nombre es obligatorio"
                },
                departamento: {
                  required: "El departamento es obligatorio",
                  min: "Debe contener minimo 5 digitos"
                },
                ciudad: {
                  required: "la ciudad es obligatorio",
                  min: "Debe contener minimo 5 digitos"
                },
                telefono_representante: {
                  required: "El telefono es obligatorio es obligatorio",
                  min: "debe contener minimo 5 digitos"
                },
                nombre_representante: {
                  required: "El nombre es obligatorio"
                }
              },
              submitHandler : function(form) {
                  sendform();
              }
            });
    
            function sendform (){
        
             
                let nombre = $('#nombre').val();
                let departamento = $('#departamento').val();
                let ciudad = $('#ciudad').val();
                let telefono_representante = $('#telefono').val();
                let nombre_representante = $('#email').val();
                let fk_id_usuario = $('#fk_id_usuario').val();
                
        
                $.ajax({
                  url: '{{ route('auth.register') }}',
                  type:"POST",
                  data:{
                    
                    nombre:nombre,
                    departamento:departamento,
                    ciudad:ciudad,
                    telefono_representante:telefono_representante,
                    nombre_representante:nombre_representante,
                    fk_id_usuario:fk_id_usuario
                  },
                  success:function(response){
                    console.log(response);
                   
                    route_list = '{{ route('comunidad.index') }}';

                    window.location.href = route_list;
                  },
                  error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert('Error - ' + errorMessage);
                }
                });
            };
    
        });
    
       
    </script>