<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $request->validate(Usuario::validationRules(), Usuario::validationRulesAlerts());

        if (!auth()->attempt($credentials)) {
            return back()->with('message.error', 'Las credenciales ingresadas no coinciden con nuestros registros. Inténtelo de nuevo ');
        }

        $request->session()->regenerate();

        $user = auth()->user();

        if ($user->roles_id == 1) {
            return redirect()->route('admin.index')->with('message.success', '¡Bienvenido de vuelta <b>' . e($user['nombre']) . '</b> al Panel de Administración de Quesitas Editorial!');
        } else {
            return redirect()->route('home')->with('message.success', '¡Bienvenido de vuelta <b>' . e($user['nombre']) . '</b> a Quesitas Editorial!');
        }

    }

    public function register()
    {
        $roles = Roles::all();

        return view('auth.register', compact('roles'));
    }


    //Acco+pm regostro:

    public function registerAction(Request $request)
    {

        $request->validate(Usuario::validationRules(), Usuario::validationRulesAlerts());

        $usuario = Usuario::create([
            'email' => $request->input('email'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'password' => Hash::make($request->input('password')),
            'roles_id' => $request->input('roles_id'),
            'biografia' => $request->input('biografia'),
        ]);

        if ($request->hasFile('img')) {
            $usuario->img = $this->uploadImg($request);
            $usuario->save();
        }

        auth()->login($usuario);

        $user = auth()->user();

        return redirect()->route('usuario.perfil')->with('message.success', '¡Bienvenido <b>' . e($user['nombre']) . '</b> a Quesitas Editorial!');
    }


    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('message.success', 'Se cerró sesión correctamente. ¡Esperamos que vuelvas pronto!');
    }


    protected function uploadImg(Request $request): string
    {
        $img = $request->file('img');
        $nombre = $request->input('nombre');

        $imgName = date('YmdHis_') . \Str::slug($nombre) . '.' . $img->guessExtension();

        $img->storeAs('img', $imgName);

        return $imgName;
    }
}