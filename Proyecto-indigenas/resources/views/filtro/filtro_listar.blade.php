@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                  <form action="{{ route('reporte.generar') }}" method="POST">
                    @csrf
                          
                        <div class="header-center">FILTROS:</div>

                        <strong>{{$filtroDpto["NOMBRE"]}}:</strong>
                        <input value="{{$id_dpto}}" name="{{$filtroDpto['ID']}}" id="{{$filtroDpto['ID']}}">

                        <div class="row">
                        
                            @foreach($filtros as $filtro)
                            <div class="form-group col-md-6">

                                <strong>{{$filtro["NOMBRE"]}}:</strong>
                                <br>
                                <select name="{{$filtro['ID']}}" id="{{$filtro['ID']}}" style="width:70%, align:center"  >
                                        @foreach($filtro["opciones"] as $opcion)
                                            <option value="{{$opcion['ID']}}">{{$opcion["NOMBRE"]}}</option> 
                                        @endforeach
                                </select>
                                </div>
                            @endforeach

                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">GENERAR REPORTE</button>
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