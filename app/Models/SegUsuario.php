<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SegUsuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'seg_usuario';
    protected $primaryKey = 'idUsuario';

    public $timestamps = false;

    protected $fillable = [
        'usuarioAlias',
        'usuarioNombre',
        'usuarioEmail',
        'usuarioPassword',
        'usuarioEstado',
        'usuarioConectado',
        'usuarioUltimaConexion',
        'usuarioUltimaConexión',
        'foto',
    ];

    protected $hidden = [
        'usuarioPassword',
        'remember_token',
    ];

    protected $casts = [
        // char(1)  → bool   ('S' / null)
        'usuarioConectado'     => 'boolean',
        // datetime → Carbon  (acceso tipo ->format(), diffForHumans(), etc.)
        'usuarioUltimaConexión'=> 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->usuarioPassword;
    }

    // Hash automático
    public function setUsuarioPasswordAttribute($value)
    {
        $this->attributes['usuarioPassword'] = bcrypt($value);
    }

    public function getEmailForPasswordReset()
    {
        return $this->usuarioEmail;
    }

    public function getEmailForVerification()
    {
        return $this->usuarioEmail;
    }

    public function getEmailAttribute()          // para otras features
    {
        return $this->usuarioEmail;
    }

    public function setUsuarioConectadoAttribute($value)
    {
        $this->attributes['usuarioConectado'] = $value ? 'S' : null;
    }

    /* Para que boolean cast funcione:  null→false, 'S'→true */
    public function getUsuarioConectadoAttribute($value)
    {
        return $value === 'S';
    }
}
