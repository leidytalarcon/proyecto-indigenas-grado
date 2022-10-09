@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">

                    @if(is_null($report))(
                        <form action="{{ route('descargarPDF',0) }}" method="GET">
                    @else
                        <form action="{{ route('descargarPDF',$report->ID) }}" method="GET">
                    @endif
                  
                    @csrf
                          
                        <div class="header-center">FILTROS:</div>

                        <div class="row">
                        
                            @empty($factores)
                                <p class="bg-danger text-white p-1">NO EXISTEN COINCIDENCIAS</p>  
                            @else
                            <div class="form-group col-md-6">

                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>FACTOR:</th>
                                            <th>COEFICIENTE:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($factores as $factor)
                                            <tr>
                                                <td> {{$factor['ALIAS']}} </td>
                                                <td> {{$factor['COEFICIENTE']}} </td>
                                            </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            @endempty

                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">GENERAR PDF</button>
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