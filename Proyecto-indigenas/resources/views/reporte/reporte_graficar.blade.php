@extends('internal_layout.layout')

@section('content')

<head>
	
		<script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>

		
</head>

  
  

	<script type="text/javascript">

    // Step 1
    



	</script>
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    
                    <form action="{{ route('descargarPDF',0) }}" method="GET">
                    
                    @csrf
                        
                        <input type="hidden" value="{{$reporteId}}" id="reporteId">
                        
                        <h2>Nivel de influencia de los índices de analfabetismo.</h2>
                        <div class="row">
                        
                            <svg width="4000" height="4000"></svg> <!--Step 2-->

                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">GENERAR PDF</button>
                            </div>
                        </div>
                           
                    </form>

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

                // Step 3
                var svg = d3.select("svg")
                        .attr("width", 4000)
                        .attr("height", 4000);

                // Step 4
                svg.selectAll("circle")
                .data(data).enter()
                .append("circle")
                .attr("cx", function(d) {return d.x})
                .attr("cy", function(d) {return d.y})
                .attr("r", function(d) {
                    return Math.sqrt(d.val)/Math.PI 
                })
                .attr("fill", function(d) {
                    return d.color;
                });

                // Step 5
                svg.selectAll("text")
                .data(data).enter()
                .append("text")
                .attr("x", function(d) {return d.x+(Math.sqrt(d.val)/Math.PI)})
                .attr("y", function(d) {return d.y+4})
                .text(function(d) {return d.source})
                .style("font-family", "arial")
                .style("font-size", "12px")
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