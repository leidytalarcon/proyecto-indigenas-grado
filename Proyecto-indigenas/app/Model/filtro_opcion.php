<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class filtro_opcion extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.filtro_opcion';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID_FILTRO',
        'NOMBRE',
        'STATEMENT',
        'DESCRIPCION',
        'FECHA_CREACION'
    
    ];

    public function filtro()
    {
        return $this->belongsTo('App\Model\filtro', 'ID_FILTRO', 'ID');
    }

   
  
}
