<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte_factor extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.reporte_factor';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID_FACTOR',
        'ID_REPORTE',
        'COEFICIENTE',
        'FECHA_CREACION'
    ];

    public function reporte()
    {
        return $this->belongsTo('App\Model\reporte', 'fk_id_reporte', 'id_reporte');
    }

    public function factor()
    {
        return $this->belongsTo('App\Model\factor', 'ID_FACTOR', 'ID');
    }
  
}