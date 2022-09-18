<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte_filtro_opcion extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte_filtro_opcion';

    public $timestamps = false;

    protected $primaryKey = 'id_reporte_filtro_opcion';

    protected $fillable = [
        'fk_id_filtro_opcion',
        'fk_id_reporte',
        'fecha_creacion',
        'fk_id_usuario'
    ];

    public function filtro_opcion()
    {
        return $this->belongsTo('App\Model\filtro_opcion', 'fk_id_filtro_opcion', 'id_filtro_opcion');
    }

    public function reporte()
    {
        return $this->belongsTo('App\Model\reporte', 'fk_id_reporte', 'id_reporte');
    }
  
}
