<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;

class RegisterController extends Controller
{
    public function index(){
        return view('register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:250',
            'numberid' => 'required|unique:administrators|max:10',
            'username' => 'required|max:50',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email:dns|unique:administrators',
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['phone'] = '+62'. $validatedData['phone'];

        Administrator::create($validatedData);

        $request->session()->flash('success', 'Registration Successfull!');

        return redirect('/register');
    }
}
