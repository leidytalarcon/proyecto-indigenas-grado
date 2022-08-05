<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foro extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'foro';

    public $timestamps = false;

    protected $primaryKey = 'id_foro';

    protected $fillable = [
        'nombre',
        'contenido',
        'fecha_creacion',
        'fk_id_usuario'

    ];

    public function comentarios()
    {
        return $this->hasMany('App\Model\foro_comentario','foro_idforo','idforo');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }

}