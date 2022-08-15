@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <form action="/reporte/generar" method="POST">
                    @csrf
                          
                        <div class="header-center">FILTROS:</div>

                        <div class="card-body">
                            
                            @foreach($filtros as $filtro)
                                <div class="form-group">
                                <strong>{{$filtro["nombre"]}}:</strong>
                                <br>
                                <select name="fk_id_tipo_documento" id="fk_id_tipo_documento" style="width:70%, align:center"  >
                                        @foreach($filtro.opciones as $opcion)
                                            <option value="{{$opcion['id_opcion']}}">{{$opcion["nombre"]}}</option> 
                                        @endforeach
                                </select>
                                </div>
                            @endforeach

                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" placeholder="digite el nombre">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CONTENIDO</label>
                              ​<textarea id="contenido" rows="10" cols="70" class="form-control col-md-15" name="contenido" placeholder="digite contenido"></textarea>
                            </div>
                        
                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">GUARDAR</button>
                            </div>
                        </div>
                           
                    </form>

                    <button class="btn btn-primary backBtn btn-lg pull-left" type="button" id="volver">VOLVER</button>

                </div>
            </div>
        </div>
    </div>

    <script>
                            jQuery(document).ready(function () {
                                
                                $('#volver').click(function(e) {
                                e.preventDefault();
                                route_list = '{{ route('filtro.mapa') }}';
                    
                                window.location.href = route_list;
                                });

                            });

                        </script>

    @endsection