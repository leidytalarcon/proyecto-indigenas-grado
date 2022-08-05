<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class indigena extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'indigena';

    public $timestamps = false;

    protected $primaryKey = 'id_indigena';

    protected $fillable = [
        'documento',   
        'nombre',
        'nacimiento',
        'direccion',
        'correo',
        'telefono',
        'fk_id_comunidad',
        'fk_id_usuario',
        'fk_id_tipo_documento'
    ];

    public function comunidad()
    {
        return $this->belongsTo('App\Model\comunidad', 'fk_id_comunidad', 'id_comunidad');
    }

    public function tipo_documento()
    {
        return $this->belongsTo('App\Model\tipo_documento', 'fk_id_tipo_documento', 'id_tipo_documento');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Model\usuario', 'fk_id_usuario', 'id_usuario');
    }
  
}
