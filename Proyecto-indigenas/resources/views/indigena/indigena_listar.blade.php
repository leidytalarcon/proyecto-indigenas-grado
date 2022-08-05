@extends('layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h2 mb-2 text-gray-800">Listar indigena</h1>
                           
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listado de indigenas</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a class="btn btn-primary"  href="{{route('descargarPDFindigena')}}" target="_blank">Ver PDF</a>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-primary" id="indigena_nuevo">Registrar indigena</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tableIndigena" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Documento</th>
                                                    <th>Nombre</th>
                                                    <th>Nacimiento</th>
                                                    <th>Direccion</th> 
                                                    <th>Correo</th> 
                                                    <th>Telefono</th> 
                                                    <th>Comunidad</th> 
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
                                 url:"{{ route('indigena.listar') }}",
                                     method: "GET",
                                 dataType: 'JSON',
                                 data:{_t:_t, v:v},

                                 success:function(data){
                                     
                                     for(var c in data){
                                        var id_indigena = data[c].id_indigena;
                                        var row = '<tr>'+
                                            '<td>'+ data[c].documento +'</td>'+
                                            '<td>'+ data[c].nombre +'</td>'+
                                            '<td>'+ data[c].nacimiento +'</td>'+
                                            '<td>'+ data[c].direccion +'</td>'+
                                            '<td>'+ data[c].correo +'</td>'+
                                            '<td>'+ data[c].telefono +'</td>'+
                                            '<td>'+ data[c].fk_id_comunidad +'</td>'+
                                            
                                            '<td>'+
                                                "<a class=\"btn btn-info\" href=\"{{ route('indigena.editar',"id_indigena") }}\">"+
                                                    '<i class="fas fa-edit"></i>'+
                                                '</a>'   +                                      
                                            '</td>'+
                                            
                                            '</tr>'
                                        
                                        $('#tableIndigena').append(row.replaceAll("id_indigena", id_indigena)
                                        );
                                    }
                                }
                            });

                            $('#indigena_nuevo').click(function(e) {
                                e.preventDefault();
                                route_list = '{{ route('indigena.nuevo') }}';
                    
                                window.location.href = route_list;
                            });
                            });

                            
                        </script>
      
      
    @endsection