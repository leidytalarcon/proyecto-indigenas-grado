@extends('internal_layout.layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <link href="{{ asset("assets/css/mapa_colombia.css") }}" rel="stylesheet">
                          <div class="container-fluid">
                           
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Filtro por departamento</h6>
                                </div>
                               
                                <div class="div-mapa-color">
                                    <svg  version="1.2" viewbox="0 0 1000 1195" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 640.1l0.2 0.9-0.6 0.5-0.4 0-0.8 0.7-0.4 0.1-0.3-0.3 0.5-0.8 0.5-0.3 0-0.6 0.4-0.2 0.9 0z" id="COL99" name="">
                                    </path>

                                    @foreach ($departamentos as $departamento)
                                        <a xlink:title="{{ $departamento['NOMBRE'] }}">
                                        <path d="{{ $departamento['LIMITES_SVG'] }}"
                                                id="{{ $departamento['U_DPTO'] }}" 
                                                name="{{ $departamento['NOMBRE'] }}"
                                                fill="{{ $departamento['COLOR'] }}">
                                        </path></a>
                                    @endforeach
                                    
                                    <circle cx="525.4" cy="663.3" id="0">
                                    </circle>
                                    <circle cx="524.8" cy="663.2" id="1">
                                    </circle>
                                    <circle cx="437.3" cy="870.9" id="2">
                                    </circle>
                                    </svg>
                                </div>
                            </div>
                            
        
                        </div>
                        <!-- /.container-fluid -->

                        <!-- FIN CONTENIDO -->
                        <script>
                            jQuery(document).ready(function () {
                                
                                $('path').on('click', function(e) {
                                    id_dpto = $(this).attr('id');

                                    e.preventDefault();
                                    route_list = '{{ route('reporte.powerbi', ":id") }}';
                                    route = route_list.replace(':id', id_dpto);
                    
                                    window.location.href = route;
                                })

                            });

                        </script>
      
    @endsection