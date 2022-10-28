@extends('internal_layout.layout')

@section('content')
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="#" method="GET">

                        <input type="hidden" value="{{$factor->ID}}" name="id_factor" id="id_factor">

                        <input type="hidden" value="{{$filtro->ID}}" name="id_dpto" id="id_dpto">
                    @csrf
                    <div style="float: left" class="col-md-6">
                        

                        <figure>
                            <h2>REPORTE {{ $factor->TITULO }} EN {{$filtro->NOMBRE}} </h2>
                            <canvas id="chartCanvas"></canvas>
                        </figure>

                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row form-group row col-md-3">

                            <button class="btn btn-primary backBtn btn-lg pull-left" type="button" id="volver">VOLVER</button>
        
                        </div>
                    </div>
                    <div style="float: right" class="col-md-6">

                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">{{ $factor->TITULO }} </h5>
                              <p class="card-text">{{ $factor->DESCRIPCION }}</p>
                              
                        </div>
                    </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset("assets/js/reporte.js") }}"></script>

    <script>
        jQuery(document).ready(function () {

            var _token = $('input[name="_token"]').val();  //you need add a token
            
            $id_factor = $( "#id_factor" ).val();
            $id_dpto = $( "#id_dpto" ).val();

            $.ajax({

                url:"{{ route('reporte.factor_departamento') }}",
                    method: "GET",
                dataType: 'JSON',
                data:{'_token':_token,
                    'id_dpto': $id_dpto,
                    'id_factor': $id_factor
                },
                success:function(data){
                    console.log(data);
                    renderChartPie(data);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
                        
            })
           
            $('#volver').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('reporte.volver') }}';
        
            window.location.href = route_list;
            });
        });
       
       
    </script>

    @endsection