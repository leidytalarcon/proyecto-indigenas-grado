<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class opcion extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'opcion';

    public $timestamps = false;

    protected $primaryKey = 'id_opcion';

    protected $fillable = [
        'valor',
        'descripcion',
        'fecha_creacion',
        'fk_id_filtro',
        'fk_id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }

    public function filtro()
    {
        return $this->belongsTo('App\Model\filtro', 'fk_id_filtro', 'id_filtro');
    }

}
