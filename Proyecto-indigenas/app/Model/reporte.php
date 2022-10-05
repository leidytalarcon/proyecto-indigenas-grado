<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.reporte';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
   
        'nombre',
        'descripcion',
        'fecha_creacion '
    ];
    

  

}
