<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'rol';

    public $timestamps = false;

    protected $primaryKey = 'id_rol';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

  
}
