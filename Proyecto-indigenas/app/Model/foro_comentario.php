<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foro_comentario extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'comentario';

    public $timestamps = false;

    protected $primaryKey = 'id_comentario';

    protected $fillable = [
        
        'comentario',
        'fecha_creacion',
        'fk_id_foro',
        'fk_id_usuario'
    ];

    public function foro()
    {
        return $this->belongsTo('App\Model\foro', 'foro_idforo', 'idforo');
    }

    public function respuestas()
    {
        return $this->hasMany('App\Model\foro_respuesta','fk_id_comentario','id_comentario');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }


  
}