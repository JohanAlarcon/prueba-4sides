<?php

namespace App\Listeners;    

use Illuminate\Auth\Events\Logout;

class RegistrarDesconexion
{
    public function handle(Logout $event)
    {
        $event->user->update([
            'usuarioConectado' => false,      // se guardará null
        ]);
    }
}
