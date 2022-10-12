@extends('internal_layout.layout')

@section('content')

<head>
	
		<script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>

		
</head>

  <h2>Nivel de influencia de los índices de 
    analfabetismo.
</h2>
  <svg width="500" height="500"></svg> <!--Step 2-->

	<script type="text/javascript">

    // Step 1
    var data = [
      {$factor:'ALIAS', x: 100, y: 60, val: 1350, color: "#C9D6DF"},
      {source:"Item 1", x: 100, y: 60, val: 1350, color: "#C9D6DF"},
      {source:"Item 2", x: 30, y: 80, val: 2500, color: "#F7EECF"},
      {source:"Item 3", x: 50, y: 40, val: 5700, color: "#E3E1B2"},
      {source:"Item 4", x: 190, y: 100, val: 30000, color: "#F9CAC8"},
      {source:"Item 5", x: 80, y: 170, val: 47500, color: "#D1C2E0"}
    ]

    // Step 3
    var svg = d3.select("svg")
              .attr("width", 500)
              .attr("height", 500);

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



	</script>
  
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