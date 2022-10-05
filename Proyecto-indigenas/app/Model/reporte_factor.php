<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte_factor extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.reporte_factor';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_factor',
        'id_reporte',
        'coeficiente',
        'fecha_creacion'
    ];

    public function reporte()
    {
        return $this->belongsTo('App\Model\reporte', 'fk_id_reporte', 'id_reporte');
    }

    public function filtro()
    {
        return $this->belongsTo('App\Model\factor', 'fk_id_factor', 'id_factor');
    }
  
}