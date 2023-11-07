<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegister;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function help()
    {
        return view('help');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authLogin(Request $request)
{
    $credentials = $request->only('email', 'password');
    
    if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === 'admin123') {
        $user = User::where('email', 'admin@gmail.com')->first();
        Auth::login($user);

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.manage.users');
        } else {
            return redirect()->route('home');
        }
    } else {
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.manage.users');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
}


    public function authRegister(AuthRegister $request)
    {

        $userCreate = $request->validated();

        $create_account = User::create([
            'name' => $userCreate['name'],
            'email' => $userCreate['email'],
            'password' => password_hash($userCreate['password'], PASSWORD_DEFAULT),
            'role' => 'user'
        ]);

        dd($userCreate);

        //return ($userCreate) ? redirect()->route('login')->with('success', 'User created successfully') : redirect()->back()->with('error', 'User creation failed');

    }

    public function authLogout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
    