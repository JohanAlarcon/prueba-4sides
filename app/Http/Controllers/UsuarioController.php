<?php

namespace App\Http\Controllers;

use App\Models\SegUsuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->idUsuario;

        $usuarios = SegUsuario::where('idUsuario', '!=',$user_id)
            ->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'usuarioAlias'   => 'required|string|max:75|unique:seg_usuario',
            'usuarioEmail'   => 'required|email|max:100|unique:seg_usuario',
            'usuarioNombre'  => 'required|string|max:100',
            'usuarioPassword' => 'required|string|confirmed',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'usuarioEstado'  => 'required|in:Activo,Inactivo',
        ]);
        $user = SegUsuario::create($data);
        if ($r->hasFile('foto')) $this->saveFoto($r->file('foto'), $user);
        return redirect()->route('usuarios.show', $user)->with('message', 'Usuario creado');
    }

    public function show(SegUsuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(SegUsuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $r, SegUsuario $usuario)
    {
        $data = $r->validate([
            'usuarioAlias'  => 'required|string|max:75|unique:seg_usuario,usuarioAlias,' . $usuario->idUsuario . ',idUsuario',
            'usuarioEmail'  => 'required|email|max:100|unique:seg_usuario,usuarioEmail,' . $usuario->idUsuario . ',idUsuario',
            'usuarioNombre' => 'required|string|max:100',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'usuarioEstado' => 'required|in:Activo,Inactivo',
        ]);
        $usuario->update($data);
        if ($r->hasFile('foto')) $this->saveFoto($r->file('foto'), $usuario);
        return redirect()->route('usuarios.index')->with('message', 'Usuario actualizado');
    }

    public function destroy(SegUsuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('message', 'Eliminado');
    }

    /* ---------- helper ---------- */
    private function saveFoto($file, SegUsuario $u)
    {
        $path = $file->store('usuarios', 'public');  // storage/app/public/usuarios
        $u->foto = $path;
        $u->save();
    }

    public function editFoto(SegUsuario $usuario)
    {
        return view('usuarios.foto', compact('usuario'));
    }

    public function updateFoto(Request $r, SegUsuario $usuario)
    {
        $r->validate(['foto' => 'required|image|mimes:jpg,jpeg,png|max:2048']);
        $this->saveFoto($r->file('foto'), $usuario);
        return redirect()->route('usuarios.show', $usuario)
            ->with('message', 'Imagen guardada');
    }
}
