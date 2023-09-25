<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {   
        // kalau validasi lolos makan dia akan menjalankan apapun yang ada di bawahnya
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], 
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        // dibawah ini menggunakan metode hash
        $validateData['password'] = Hash::make($validateData['password']);

        // masukan ke dalam database, tabel user
        User::create($validateData);
        // cara alert pertama
        // $request->session()->flash('success', 'Registration successfull! Please login');
        
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
