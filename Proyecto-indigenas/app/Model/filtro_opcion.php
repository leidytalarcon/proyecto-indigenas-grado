<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class filtro_opcion extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'reporte.filtro_opcion';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_filtro',
        'nombre',
        'statement',
        'descripcion',
        'fecha_creacion'
    
    ];

    public function filtro()
    {
        return $this->belongsTo('App\Model\filtro', 'id', 'id_filtro');
    }

   
  
}
