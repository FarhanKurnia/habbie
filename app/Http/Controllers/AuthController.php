<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use App\Mail\ForgetPassword;
use Carbon\Carbon;

class AuthController extends Controller
{
// Register
    public function register(){
        return view('test.register');
    }

    public function registerProcess(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users'|'email:dns',
            'password' => 'required'
        ]);
        $token = Str::random(128);
        $name = $request->name;
        $email = $request->email;
        $user = new User;
        $user->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($request->password) ,
            'role_id' => 2,
            'token_verification' =>$token ,
            'email_verified' => false,
        ]);
        $data = [
            'title' => 'Email Verification',
            'name' => $name,
            'url' => route('verification',$token),
        ];
        Mail::to($email)->send(new Verification($data));
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
    
    //logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }

    // Verification Account after register
   public function verification($token)
   {
        $user = User::where('token_verification',$token)->firstOrFail();
        if($user->email_verified == false){
            $user->update([
                'email_verified' => true,
                'email_verified_at' => Carbon::now(),
            ]);
            $log = 'Email berhasil diverifikasi';
        }else{
            $log = 'Email sudah diverifikasi';
        }
        return view('test.mail.email-verification-success',compact('user','log'));
   }

   public function forgetPassword(){
        return view('test.forget-password');    
   }

   // Forget Password
   public function forgetPasswordProcess(Request $request)
   {
        $request->validate([
            'email'=>'required|email:dns',
            'otp' => 'required',
            'password' => 'required'
        ]);
        $user = User::where([['deleted_at',null],['email',$request->email],['otp',$request->otp]])->firstOrFail();
        $user->update([
            'otp' => null,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login');
   }

   // Request OTP View
   public function requestOTP(){
        return view('test.request-otp');
   }

   // Request OTP (One Time Password) for forget password
   public function requestOTPProcess(Request $request)
   {
        $otp = Str::random(12);
        $email = $request->email;
        $user = User::where([['deleted_at',null],['email',$email]])->count();

        if($user>0){
            User::where([['deleted_at',null],['email',$email]])->update(['otp'=>$otp]);
            $data = [
                'title' => 'Email Forget Password',
                'otp' => $otp,
                'url' => route('forgetPassword'),
            ];
            Mail::to($email)->send(new ForgetPassword($data));
        }
        return redirect()->route('forget-password');
   }

    //profile debug
    public function profile(){
        $user = Auth::user();
        dd($user);
    }
}
