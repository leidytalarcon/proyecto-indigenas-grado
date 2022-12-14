@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <div class="section-title">
                    <h2>AGREGAR USUARIO</h2>
                    <p></p>
                  </div>

                  <form class="user"  id="userForm">
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
                              <input type="number" class="form-control col-md-15" id="documento" name="documento" placeholder="Ingrese documento">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="nombre" >NOMBRE </label>
                              <input type="text" class="form-control col-md-15" id="nombre" name="nombre" placeholder="digite el nombre">
                              
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">TELEFONO</label>
                              <input type="number" class="form-control col-md-15" id="telefono" name="telefono" placeholder="ingrese su numero" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">CORREO</label>
                              <input type="email" class="form-control col-md-15" id="email" name="email" placeholder="ingrese su correo">
                            </div>
                            <div class="form-group col-md-6">
                              <label for=""class="col-md-6">CONTARSE??A</label>
                              <input type="password" class="form-control col-md-15" id="password" name="password" placeholder="ingrese su contrase??a">
                            </div>
                            <br>
                            <strong>TIPO DOCUMENTO:</strong>
                            <br>
                            <select name="fk_id_tipo_documento" id="fk_id_tipo_documento" style="width:70%, align:center"  >
                                    @foreach($tipos_documento as $tipo_documento)
                                        <option value="{{$tipo_documento['id_tipo_documento']}}">{{$tipo_documento["nombre"]}}</option> 
                                    @endforeach
                            </select>
                            <br>
                            <strong>ROL:</strong>
                            <br>
                            <select name="fk_id_rol" id="fk_id_rol" style="width:70%, align:center"  >
                                    @foreach($roles as $rol)
                                        <option value="{{$rol['id_rol']}}">{{$rol["nombre"]}}</option> 
                                    @endforeach
                            </select>
                            
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
                return /^[a-zA-Z\s]*$/.test(value);
              },"Solo puede ingresar letras y espacios"
        );

        $.validator.addMethod("correo",function(value) {
                return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
              },"Direccion de correo no valida"
        );

        $("#userForm").validate({
              rules: {
                nombre : {
                  required: true,
                  letrasEspacios: true
                },
                documento:{
                  required:true,
                  minlength: 5,
                  maxlength: 15
                },
                telefono:{
                  required:true,
                  number: true,
                  minlength: 5,
                  maxlength: 15
                },
                email:{
                  required:true,
                  correo: true
                },
                password:{
                  required:true,
                  maxlength: 10
                },

               
              },
              messages : {
                nombre: {
                  required: "El nombre es obligatorio"
                },
                documento: {
                  required: "El documento es obligatorio",
                  minlength: "Debe contener minimo 5 digitos",
                  maxlength: "Debe contener maximo 15 digitos"
                },
                telefono: {
                  required: "El telefono es obligatorio",
                  number: "Solo puede ingresar n??meros",
                  minlength: "Debe contener minimo 5 digitos",
                  maxlength: "Debe contener maximo 15 digitos"
                },
                email: {
                  required: "El email es obligatorio",
                  correo: "Ingrese una direcci??n de correo valida"
                },
                password: {
                  required: "El password es obligatorio",
                  maxlength: "Debe contener maximo 10 digitos"
                }
              },
              submitHandler : function(form) {
                  sendform();
              }
            });
    
            function sendform (){
        
                let documento = $('#documento').val();
                let nombre = $('#nombre').val();
                let telefono = $('#telefono').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let fk_id_tipo_documento = $('#fk_id_tipo_documento').val();
                let fk_id_rol = $('#fk_id_rol').val();
                
        
                $.ajax({
                  url: '{{ route('auth.register') }}',
                  type:"POST",
                  data:{
                    documento:documento,
                    nombre:nombre,
                    telefono:telefono,
                    fk_id_tipo_documento:fk_id_tipo_documento,
                    fk_id_rol:fk_id_rol,
                    email:email,
                    password:password
                  },
                  success:function(response){
                    console.log(response);
                   
                    route_list = '{{ route('usuario.index') }}';

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