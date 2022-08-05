<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comunidad extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'comunidad';

    public $timestamps = false;

    protected $primaryKey = 'id_comunidad';

    protected $fillable = [
        'nombre',
        'departamento',
        'ciudad',
        'telefono_representante',
        'nombre_representante',
        'fk_id_usuario'
    ];

    public function indigenas()
    {
        return $this->hasMany('App\Model\docindigena','fk_id_comunidad','id_comunidad');
    }
  
}
