<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SegUsuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuarioNombre' => ['required', 'string', 'max:100'],
            'usuarioEmail' => ['required', 'string', 'email', 'max:100', 'unique:seg_usuario'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
    
        $user = SegUsuario::create([
            'usuarioNombre' => $request->usuarioNombre,
            'usuarioEmail' => $request->usuarioEmail,
            'usuarioPassword' => Hash::make($request->password),
            'usuarioEstado' => 'Activo',
        ]);
    
        event(new Registered($user));
        Auth::login($user);
    
        return redirect(route('dashboard', absolute: false)); 

    }
}
