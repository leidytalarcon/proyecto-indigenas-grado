<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.U_DPTO';

    public $timestamps = false;

    protected $primaryKey = 'U_DPTO';

    protected $fillable = [
        'NOMBRE',
        'LIMITES_SVG',
        'COLOR',
        'URL_POWER_BI'
    ];   
  
}
