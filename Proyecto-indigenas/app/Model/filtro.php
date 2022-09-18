<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class filtro extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'filtro';

    public $timestamps = false;

    protected $primaryKey = 'id_filtro';

    protected $fillable = [
        'nombre',
        'contenido',
        'fecha_creacion',
        'fk_id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }

    public function opciones()
    {
        return $this->hasMany('App\Model\opcion','fk_id_filtro','id_filtro');
    }
  
}
