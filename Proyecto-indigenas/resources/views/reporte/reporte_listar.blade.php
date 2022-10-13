@extends('internal_layout.layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="#" method="GET">
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

                           
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection