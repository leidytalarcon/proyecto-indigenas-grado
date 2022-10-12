@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    
                    <form action="{{ route('descargarPDF',0) }}" method="GET">
                    
                    @csrf
                        
                        <input type="hidden" value="{{$reporteId}}" id="reporteId">
                        
                        <div class="header-center">FILTROS:</div>

                        <div class="row">
                        
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableIndigena" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>FACTOR</th>
                                            <th>COEFICIENTE</th>
                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>

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
            var _t = $('input[name="_token"]').val();  //you need add a token
            var v = $(this).val();

            var reporteId = $('#reporteId').val();

            
            $.ajax({
            url:"{{ route('reporte.grafica') }}",
                method: "GET",
            dataType: 'JSON',
            data:{_t:_t, v:v, 'reporteNombre':reporteId},

            success:function(data){
                console.log(data);
                for(var c in data){

                    var row = '<tr>'+
                        '<td>'+ data[c].ALIAS +'</td>'+
                        '<td>'+ data[c].COEFICIENTE +'</td>'+

                        '</tr>'
                    
                    $('#tableIndigena').append(row);
                }
            }
        });


        $('#volver').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('filtro.mapa') }}';
                        
            window.location.href = route_list;
        });

        });

        
    </script>

@endsection