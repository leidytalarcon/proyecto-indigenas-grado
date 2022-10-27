@extends('internal_layout.layout')

@section('content')
<iframe title="proyecto indigena_antioquia" width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=2fa825b3-85c5-40e0-98ad-e0114a0c7305&autoAuth=true&ctid=07da67a0-1f43-4e8c-977f-5f88b6470ee6" frameborder="0" allowFullScreen="true"></iframe>
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="#" method="GET">
                    @csrf
                          
                    <div style="float: left" class="col-md-6">
                        

                        <img src="{{ $factor->URL_IMAGEN }}" alt="logo">

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
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function () {

            var _token = $('input[name="_token"]').val();  //you need add a token
           
            $('#volver').click(function(e) {
            e.preventDefault();
            route_list = '{{ route('reporte.volver') }}';
        
            window.location.href = route_list;
            });
        });
       
       
    </script>

    @endsection