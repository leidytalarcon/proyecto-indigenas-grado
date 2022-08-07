<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'reporte';

    public $timestamps = false;

    protected $primaryKey = 'id_reporte';

    protected $fillable = [
   
        'respuesta',
        'fecha_creacion',
        'fk_id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }

    public function reportes_factor()
    {
        return $this->hasMany('App\Model\reporte_factor','fk_id_reporte','id_reporte');
    }

}
