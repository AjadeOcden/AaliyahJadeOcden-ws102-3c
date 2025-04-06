<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginLogoutController extends Controller
{
    public function registrationForm(){
        return view('registrationForm');
    }
    public function register(Request $request){
        // Validate input
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $name = $request->input('name');
       $email = $request->input('email');
       $password = Hash::make($request->input('password'));

       DB::insert('INSERT INTO users (name, email, password, created_at, updated_at) Values(?,?,?,?,?)', [$name,$email,$password, now(), now()]);

       return redirect()->route('login')->with('success', 'Registration Successful!');
    }

    public function loginForm(){
        return view("loginForm");
    }
    
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    
        $email = $request->input("email");
        $password = $request->input("password");
    
        $user = DB::select("SELECT * FROM users WHERE email = ?", [$email]);
    
        if ($user) {
            if (Hash::check($password, $user[0]->password)) {
                
                    Auth::loginUsingId($user[0]->id);
                    return redirect("books");
                
            } else {
                return back()->with("error", "Invalid password.");
            }
        } else {
            return back()->with("error", "User not found.");
        }
    }

    public function home(){
        return view("home");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }



}
