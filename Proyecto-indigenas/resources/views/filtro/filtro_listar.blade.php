@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div style="float: left" class="col-md-6">
                  
                    @csrf
                          
                        <div class="form-group row col-md-6">
                            <h2 style="text-align: center;">FILTROS</h2>
                        </div>

                        <input type="hidden" value="{{$id_dpto}}" name="dpto" id="dpto">

                        
                        @foreach($filtros as $filtro)
                        <div class="form-group row col-md-6">

                            <strong>{{$filtro["NOMBRE"]}}:</strong>
                            <br>
                            <select name="{{$filtro['NOMBRE']}}" id="{{$filtro['NOMBRE']}}" style="width:70%, align:center"  >
                                    @foreach($filtro["opciones"] as $opcion)
                                        <option value="{{$opcion['ID']}}">{{$opcion["NOMBRE"]}}</option> 
                                    @endforeach
                            </select>
                            </div>
                        @endforeach

                        <br>
                        <br>
                        <div class="row form-group row col-md-6">
                            <button class="btn btn-primary backBtn btn-lg pull-left" type="button" id="generar2">GENERAR REPORTE</button>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row form-group row col-md-3">

                            <button class="btn btn-primary backBtn btn-lg pull-left" type="button" id="volver">VOLVER</button>
        
                        </div>

                </div>

                <div style="float: right" class="col-md-6">
                        
                    <figure>
                        <h2>REPORTE</h2>
                        <canvas id="modelsChart"></canvas>
                    </figure>

                    <div class="row form-group">
                        <button class="btn-success col-md-4 offset-2" type="button" id="generar_pdf">GENERAR PDF</button>
                        <button class="btn-success col-md-4 offset-2" type="button" id="generar_excel">GENERAR EXCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset("assets/js/reporte.js") }}"></script>

    <script>
        jQuery(document).ready(function () {

            var _token = $('input[name="_token"]').val();  //you need add a token
           
            $('#volver').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('filtro.mapa') }}';
        
            window.location.href = route_list;
            });
 

           $('#generar2').click(function(e) {
                        
                $1 = $( "#GENERO option:selected" ).val();
                $2 = $( "#RANGO\\ EDAD option:selected" ).val();
                $3 = $( "#dpto" ).val();

                console.log($3,$1,$2);
                $.ajax({
                        url:"{{ route('reporte.generar') }}",
                            method: "GET",
                        dataType: 'JSON',
                        data:{'_token':_token,
                            'GENERO': $1,
                            'RANGO EDAD': $2,
                            'DEPARTAMENTO': $3
                        },
                        success:function(data){
                            console.log(data);
                            renderChart(data);
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }
                        
                })
                
               
           });

           $('#generar_excel').click(function(e) {
                $1 = $( "#GENERO option:selected" ).val();
                $2 = $( "#RANGO\\ EDAD option:selected" ).val();
                $3 = $( "#dpto" ).val();

                $.ajax({
                    url:"{{ route('descarga.excel') }}",
                    type: "GET",
                    data:{'_token':_token,
                        'GENERO': $1,
                        'RANGO EDAD': $2,
                        'DEPARTAMENTO': $3
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },

                    success: function(response){
                        var blob = new Blob([response]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "REPORTE.xls";
                        link.click();
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });

            $('#generar_pdf').click(function(e) {
                $1 = $( "#GENERO option:selected" ).val();
                $2 = $( "#RANGO\\ EDAD option:selected" ).val();
                $3 = $( "#dpto" ).val();

                $.ajax({
                    url:"{{ route('descarga.pdf') }}",
                    type: "GET",
                    data:{'_token':_token,
                        'GENERO': $1,
                        'RANGO EDAD': $2,
                        'DEPARTAMENTO': $3
                    },
                    contentType:false,
                    processData:false,
                    xhrFields: {
                        responseType: 'blob'
                    },

                    success: function(response){
                        var blob = new Blob([response]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "REPORTE.pdf";
                        link.click();
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });

       });
       
       var config = {
            route: "{{ route('reporte.factor', ['id_factor' => '', 'id_dpto' => '']) }}",
            id_dpto: $( "#dpto" ).val()
        };
       
    </script>

@endsection