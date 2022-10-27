<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class factor extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.factor';

    public $timestamps = false;

    protected $primaryKey = 'ID';

    protected $fillable = [   
        'NOMBRE_COLUMNA',
        'ALIAS',
        'TITULO',
        'DESCRIPCION',
        'URL_IMAGEN'
    ];
 
}