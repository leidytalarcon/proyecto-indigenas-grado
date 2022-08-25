<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class filtro_opcion extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'filtro_opcion';

    public $timestamps = false;

    protected $primaryKey = 'id_filtro_opcion';

    protected $fillable = [
        'fk_id_filtro',
        'fk_id_opcion',
        'fecha_creacion',
        'fk_id_usuario'
    ];

    public function filtro()
    {
        return $this->belongsTo('App\Model\filtro', 'fk_id_filtro', 'id_filtro');
    }

    public function opcion()
    {
        return $this->belongsTo('App\Model\opcion', 'fk_id_opcion', 'id_opcion');
    }
  
}
