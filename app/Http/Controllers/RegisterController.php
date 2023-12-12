<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required | max:30',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('login');
    }
}
