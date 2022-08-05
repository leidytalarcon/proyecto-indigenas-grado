@extends('layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h2 mb-2 text-gray-800">Listar usuarios</h1>
                           
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listado de usuario</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a class="btn btn-primary" id="usuario_nuevo">Registrar usuario</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tableUsuario" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Documento</th>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th> 
                                                    <th>email</th> 
                                                    <th>tipo documento</th> 
                                                    <th>rol</th>
                                                    <th>Acciones</th> 
                                                    
                                           
                                                </tr>
                                            </thead>
                                            <tbody>

                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <!-- /.container-fluid -->

                        <!-- FIN CONTENIDO -->

                        <script>
                            jQuery(document).ready(function () {
                                var _t = $('input[name="_token"]').val();  //you need add a token
                                var v = $(this).val();
                                $.ajax({
                                 url:"{{ route('usuario.listar') }}",
                                     method: "GET",
                                 dataType: 'JSON',
                                 data:{_t:_t, v:v},

                                 success:function(data){
                                     
                                     for(var c in data){
                                        var id_usuario = data[c].id_usuario;
                                        var row = '<tr>'+
                                            '<td>'+ data[c].documento +'</td>'+
                                            '<td>'+ data[c].nombre +'</td>'+
                                            '<td>'+ data[c].telefono +'</td>'+
                                            '<td>'+ data[c].email +'</td>'+
                                            '<td>'+ data[c].fk_id_tipo_documento +'</td>'+
                                            '<td>'+ data[c].fk_id_rol +'</td>'+
                                            '<td>'+
                                                "<a class=\"btn btn-info\" href=\"{{ route('usuario.editar',"id_usuario") }}\">"+
                                                    '<i class="fas fa-edit"></i>'+
                                                '</a>'   +                                      
                                            '</td>'+
                                            
                                            '</tr>'
                                        
                                        $('#tableUsuario').append(row.replaceAll("id_usuario", id_usuario)
                                        );
                                    }
                                }
                            });

                            $('#usuario_nuevo').click(function(e) {
                                e.preventDefault();
                                route_list = '{{ route('usuario.nuevo') }}';
                    
                                window.location.href = route_list;
                            });
                            });

                            
                        </script>
      
      
    @endsection