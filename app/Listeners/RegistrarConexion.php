<?php

namespace App\Listeners;   

use Illuminate\Auth\Events\Login;
use Carbon\Carbon;

class RegistrarConexion
{
    public function handle(Login $event)
    {
        $user = $event->user;                 // SegUsuario
        $user->update([
            'usuarioConectado'      => true,  // mutator lo convierte a 'S'
            'usuarioUltimaConexión' => Carbon::now(),
        ]);
    }
}
