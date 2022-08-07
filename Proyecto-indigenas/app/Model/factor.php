<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class factor extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'factor';

    public $timestamps = false;

    protected $primaryKey = 'id_factor';

    protected $fillable = [   
        'nombre',
        'descripcion',
        'fecha_creacion',
        'fk_id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }

    public function reportes_factor()
    {
        return $this->hasMany('App\Model\reporte_factor','fk_id_factor','id_factor');
    }
}