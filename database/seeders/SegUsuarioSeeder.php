<?php

namespace Database\Seeders;

use App\Models\SegUsuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SegUsuarioSeeder extends Seeder
{
    public function run()
    {
        SegUsuario::create([
            'usuarioAlias' => 'admin',
            'usuarioNombre' => 'Admin',
            'usuarioEmail' => 'admin@gmail.com',
            'usuarioPassword' => 'password',
            'usuarioEstado' => 'Activo',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            SegUsuario::create([
                'usuarioAlias' => 'usuario' . $i,
                'usuarioNombre' => 'Usuario' . $i,
                'usuarioEmail' => 'usuario' . $i . '@gmail.com',
                'usuarioPassword' => 'password',
                'usuarioEstado' => rand(0, 1) ? 'Activo' : 'Inactivo',
            ]);
        }
    }
}
