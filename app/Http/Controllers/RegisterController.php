<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $NOT_IN = [
            'editar-prefil',
            'login',
            'register',
            'logout',
            'posts',
            'imagenes'
        ];

        $request->request->add(['username' => Str::slug($request->username)]);
        //validacion
        $this->validate($request, [
            'name' => ['required', 'max:30'],
            'username' => ['required', 'unique:users', 'min:3', ' max:20', 'not_in:' . implode(',', $NOT_IN)],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //redireccion
        return redirect()->route('post.index', auth()->user());
    }
}
