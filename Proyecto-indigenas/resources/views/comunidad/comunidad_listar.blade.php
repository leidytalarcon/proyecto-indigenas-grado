@extends('layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <div class="container-fluid">
                           
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listado de Comunidades</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        
                                        <div class="pull-right">
                                            <a class="btn btn-primary" id="comunidad_nuevo">Crear comunidad</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="table_comunidad" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Departamento</th>
                                                    <th>Ciudad</th>
                                                    <th>Telefono</th>
                                                    <th>Representante</th>
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
                                 url:"{{ route('comunidad.listar') }}",
                                     method: "GET",
                                 dataType: 'JSON',
                                 data:{_t:_t, v:v},

                                 success:function(data){
                                     
                                     for(var c in data){
                                        var id_comunidad = data[c].id_comunidad;
                                        var row = '<tr>'+
                                            '<td>'+ data[c].id_comunidad +'</td>'+
                                            '<td>'+ data[c].nombre +'</td>'+
                                            '<td>'+ data[c].departamento +'</td>'+
                                            '<td>'+ data[c].ciudad +'</td>'+
                                            '<td>'+ data[c].telefono_representante +'</td>'+
                                            '<td>'+ data[c].nombre_representante +'</td>'+
                                            
                                            '<td>'+
                                                "<a class=\"btn btn-info\" href=\"{{ route('comunidad.editar',"id_comunidad") }}\">"+
                                                    '<i class="fas fa-edit"></i>'+
                                                '</a>'   +                                      
                                            '</td>'+
                                            
                                            '</tr>'
                                        
                                        $('#table_comunidad').append(row.replaceAll("id_comunidad", id_comunidad)
                                        );
                                    }
                                }
                            });

                            $('#comunidad_nuevo').click(function(e) {
                                e.preventDefault();
                                route_list = '{{ route('comunidad.nuevo') }}';
                    
                                window.location.href = route_list;
                            });
                            });

                            
                        </script>
      
    @endsection