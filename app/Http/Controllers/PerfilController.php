<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    /* Vista del perfil */
    public function show()
    {
        $user = auth()->user();               // instancia de SegUsuario
        return view('perfil.show', compact('user'));
    }

    /* Actualizar perfil */
    public function update(Request $r)
    {
        $user = auth()->user();

        $r->validate([
            'usuarioAlias'  => [
            'required','string','max:75',
            Rule::unique('seg_usuario','usuarioAlias')
                 ->ignore($user->idUsuario,'idUsuario')
            ],
            'usuarioNombre' => ['required','string','max:100'],
            'usuarioEmail'  => [
            'required','email','max:100',
            Rule::unique('seg_usuario','usuarioEmail')
                 ->ignore($user->idUsuario,'idUsuario')
            ],
            'password'      => ['nullable','string','confirmed'],
            'foto'          => ['nullable','image','mimes:jpg,jpeg,png','max:2048'],
        ]);

        /* Campos básicos */
        $user->fill($r->only('usuarioAlias','usuarioNombre','usuarioEmail'));

        /* Password (usa el mutador setUsuarioPasswordAttribute) */
        if ($r->filled('password')) {
            $user->usuarioPassword = $r->password;
        }

        /* Foto */
        if ($r->hasFile('foto')) {
            $path      = $r->file('foto')->store('usuarios','public');
            $user->foto = $path;
        }

        $user->save();

        return back()->with('message','Perfil actualizado correctamente.');
    }
}