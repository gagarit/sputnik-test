<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    public function index(){
        $users = MyUser::all();
        return response()->json($users);
    }


    public function store(Request $request)   {
        $request->validate([
          'login' => 'required|string|max:255|unique:my_users', 
          'password' => 'required|string|min:8', 
        ]);

        $user = MyUser::create([
          'login' => $request->input('login'), 
          'password' => bcrypt($request->input('password')), 
        ]);

        return response()->json($user, 201);
    }
}
