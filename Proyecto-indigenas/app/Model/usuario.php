<?php
 
namespace App;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
 
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $connection = 'mysql';

    protected $table = 'users';

    public $timestamps = false;

    protected $primaryKey = 'id_usuario';
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento',
        'nombre',
        'telefono',
        'email',
        'password',
        'fk_id_tipo_documento',
        'fk_id_rol'
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tipo_documento()
    {
        return $this->belongsTo('App\Model\tipo_documento', 'fk_id_tipo_documento', 'id_tipo_documento');
    }

    public function rol()
    {
        return $this->belongsTo('App\Model\rol', 'fk_id_rol', 'id_rol');
    }
}