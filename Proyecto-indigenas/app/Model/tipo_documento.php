<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'tipo_documento';

    public $timestamps = false;

    protected $primaryKey = 'id_tipo_documento';

    protected $fillable = [
        'nombre'
    ];

  
}
