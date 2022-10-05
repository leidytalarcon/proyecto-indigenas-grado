<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class filtro extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.filtro';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_creacion'

      
    ];

   
  
}
