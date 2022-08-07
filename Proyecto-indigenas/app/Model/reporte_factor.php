<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte_factor extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'reporte_factor';

    public $timestamps = false;

    protected $primaryKey = 'id_reporte_factor';

    protected $fillable = [

        'fk_id_reporte',
        'fk_id_factor',
        'coeficiente'
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