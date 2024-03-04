<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    $data = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|unique:users',
      'password' => 'required|min:5|max:255'
    ]);

    $data['password'] = Hash::make($data['password']);

    $user = new User($data);
    $user->save();

    return redirect('/login')->with('success', 'Registration successfully! Please login');
  }
}
