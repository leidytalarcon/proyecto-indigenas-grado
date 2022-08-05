@extends('layout')

@section('content')
  
<div class="container mt-10 justify-content-center">
    
                <div class="form_register">
                  <form action="/foro/comentario/guardar" method="POST">
                    @csrf
                          
                        <div class="header-center">AGREGAR COMENTARIO</div>

                        <div class="card-body">
                            <div class="form-group">
                              <label for=""class="col-12 ">COMENTARIO</label>
                              <input type="text" class="form-control col-md-15" name="comentario" placeholder="Ingrese comentario">
                            </div>
                            <input type="hidden" class="form-control col-md-15" name="idforo"  value="{{ $idforo }}">
                        
                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">AGREGAR</button>
                            </div>
                        </div>
                           
                    </form>
                </div>
           

    @endsection