<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class factor extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'factor';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [   
        'nombre_columna',
        'alias'
    ];
 
}