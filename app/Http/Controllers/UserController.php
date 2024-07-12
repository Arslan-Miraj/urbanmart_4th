<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);


        // Using direct method because we have same name fields form and database
        // If not, then we have to use create method in array
        $user = User::create($data);
        if ($user){
            return redirect()->route('login');
        }
    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('selling_orders.index');
        }else{
            return redirect()->route('login')->with('error', 'Login failed');
        }
    }

    public function logout(){
        Auth::logout();
        return view('registration.logout');
    }
}
