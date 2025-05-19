<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form (always redirect here first)
    public function showLoginForm()
=======
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    // Mostrar formulário de login
    public function mostrarFormularioLogin()
>>>>>>> Stashed changes
    {
        return view('auth.login');
    }

<<<<<<< Updated upstream
    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return Auth::user()->is_admin 
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Show registration form (only for regular users)
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration (only creates regular users)
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => false
        ]);

        return redirect()->route('login')->with('success', 'Conta criada! Faça login.');
    }

    // Handle logout
=======
    // Processar login
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credenciais, $request->boolean('lembrar'))) {
            $request->session()->regenerate();
            return redirect()->intended(
                auth()->user()->is_admin ? route('admin.painel') : route('inicio')
            );
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    // Mostrar formulário de registro
    public function mostrarFormularioRegistro()
    {
        return view('auth.registro');
    }

    // Processar registro
    public function registro(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        return redirect()->route('entrar')->with('status', 'Conta criada com sucesso! Faça login.');
    }

    // Logout
>>>>>>> Stashed changes
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
<<<<<<< Updated upstream
        return redirect('/login');
=======
        return redirect('/');
>>>>>>> Stashed changes
    }
}