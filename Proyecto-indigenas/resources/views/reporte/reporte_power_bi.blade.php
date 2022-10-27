@extends('internal_layout.layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <link href="{{ asset("assets/css/mapa_colombia.css") }}" rel="stylesheet">
                          <div class="container-fluid">
                           
                            <!-- DataTales Example -->
                            <div>
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Filtro por departamento</h6>
                                </div>
                               
                                    <iframe title="analisis_proyecto indigena" width="1140" height="541.25"
                                     src="{{ $urlReporte['URL_POWER_BI'] }}"
                                     frameborder="1" allowFullScreen="true"></iframe>


                                    <button class="btn btn-primary backBtn btn-lg pull-left" type="button" id="volver">VOLVER</button>
        
                            </div>
                            
        
                        </div>
                        <!-- /.container-fluid -->

                        <!-- FIN CONTENIDO -->
                        <script>
                            jQuery(document).ready(function () {
                                
                                $('#volver').click(function(e) {
                                    e.preventDefault();
                                    route_list = '{{ route('reporte.mapa') }}';
                                
                                    window.location.href = route_list;
                                });

                            });

                        </script>
      
    @endsection