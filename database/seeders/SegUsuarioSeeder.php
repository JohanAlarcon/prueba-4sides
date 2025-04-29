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
            'usuarioNombre' => 'Admin',
            'usuarioEmail' => 'admin@gmail.com',
            'usuarioPassword' => Hash::make('password'),
            'usuarioEstado' => 'Activo',
        ]);
    }
}
