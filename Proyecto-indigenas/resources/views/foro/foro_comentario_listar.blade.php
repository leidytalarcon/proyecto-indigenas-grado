@extends('layout')
@section('content')
    
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@foreach ($foro->comentarios as $comentario)
                           
<div class="well well-lg">
    <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span>{{ $comentario->usuario->nombre }}</h4>
    <p class="media-comment">
        {{ $comentario->fecha_creacion  }}
    </p> 
    <p class="media-comment">
        {{ $comentario->comentario }}
    </p>
    <a class="btn btn-info btn-circle text-uppercase" role="button" data-toggle="collapse" href="#replyCommentT{{$comentario->id_comentario}}" aria-expanded="false" aria-controls="collapseExample">
        <span class="glyphicon glyphicon-share-alt"></span>Responder
    </a>
    
    <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne{{$comentario->id_comentario}}"><span class="glyphicon glyphicon-comment"></span></a>
</div>  
<div class="collapse" id="replyCommentT{{$comentario->id_comentario}}">
    <form action="/foro/respuesta/guardar" method="POST">
        @csrf
      <div class="form-group">
        <label for="respuesta">Responder: </label>
        <input type="text" class="form-control col-md-15" name="respuesta" placeholder="Ingrese respuesta">
        <input type="hidden" class="form-control col-md-15" name="id_comentario"  value="{{ $comentario->id_comentario }}">
        <input type="hidden" class="form-control col-md-15" name="id_foro"  value="{{ $foro->id_foro }}">
                          
      </div>
      <button type="submit" class="btn-success col-md-9 offset-2">Guardar</button>
    </form>
</div>

<div class="collapse" id="replyOne{{$comentario->id_comentario}}">
   
            @if($comentario->respuestas->isEmpty())
            <div class="card">
                <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span>Sin respuestas</h4>
            </div>
            @endif
            @foreach ($comentario->respuestas as $respuesta)
            <div class="card" style="margin-left: 10%;margin-right: 10%">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="media-heading text-uppercase reviews">{{ $respuesta->usuario->nombre }}</h4>
                        <p class="card-text">
                            {{ $respuesta->respuesta  }}
                        </p> 
                        <p class="card-footer">
                            {{ $respuesta->fecha_creacion }}
                        </p>
                        <a class="btn btn-danger btn-circle" href="{{ route('respuesta.eliminar',$respuesta->id_respuesta) }}"><span class="glyphicon glyphicon-remove-sign"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        
</div>
                                
                                
@endforeach
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('comentario.nuevo',$foro->idforo) }}">Crear comentario</a>
        </div>
    </div>
</div>
                              
@endsection
