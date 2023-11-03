<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile() {
        return view('users.profile');
    }

    public function checkout() {
        return view('users.checkout');
    }
    public function ship() {
        return view('users.ship');
    }
}
