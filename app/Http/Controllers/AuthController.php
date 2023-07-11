<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
// Register
    public function register(){
        return view('test.register');
    }

    public function registerProcess(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        $user = new User;
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ,
            'role_id' => 2,
            'email_verified' => false,
        ]);
        return redirect()->route('login');
    }
//Login
    public function login(){
        return view('test.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email:dns',
        	'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('/test/home/home');
            if (Auth::user()->role_id == 1) {
                return redirect()->guest(route('dashboard'));
            } else{
                return redirect()->guest(route('home'));
            }
        }
        return back()->with('loginError','Login Failed!');
    }
    
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }

    public function profile(){
        dd(Auth::user());
    }
}
