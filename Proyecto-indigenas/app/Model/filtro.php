<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class filtro extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.filtro';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    protected $fillable = [
        'NOMBRE',
        'DESCRIPCION',
        'FECHA_CREACION'
    ];

    public function opciones()
    {
        return $this->hasMany('App\Model\filtro_opcion','ID_FILTRO','ID');
    }

   
  
}
