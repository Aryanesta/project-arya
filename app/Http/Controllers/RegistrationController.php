<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;

class RegistrationController extends Controller
{
    public function index () {
        return view('pages/registration', [
            'title' => 'Registration'
        ]);
    }

    public function store (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email:dns|unique:users|unique:users,email',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        
        Session::flash('success', 'Registrasi berhasil');

        return redirect('/');

        // dd('berhasil kamu cuy');
    }
}
