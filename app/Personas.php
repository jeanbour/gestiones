<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Personas extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personas';

    public $timestamps = false;

    // $fillable = array('id', 'id_domicilio', 'nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'celular', 'foto');
    protected $fillable = ['id_domicilio', 'nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'celular', 'foto'];
}
