<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.reporte';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    protected $fillable = [
   
        'NOMBRE',
        'DESCRIPCION',
        'FECHA_CREACION '
    ];
    

  

}
