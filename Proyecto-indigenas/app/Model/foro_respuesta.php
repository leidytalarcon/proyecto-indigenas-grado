<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foro_respuesta extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'respuesta';

    public $timestamps = false;

    protected $primaryKey = 'idrespuesta';

    protected $fillable = [
        'respuesta' ,
        'fecha_creacion' ,
        'fk_id_comentario',
        'fk_id_usuario'
        
    ];
    public function comentario()
    {
        return $this->belongsTo('App\Model\foro_comentario', 'id_comentario', 'fk_id_comentario');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }

} 