<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use App\Mail\ForgetPassword;
use App\Models\Subscriber;
use Carbon\Carbon;
use Livewire\Livewire;

class AuthController extends Controller
{
    // Register
    public function register(){
        return view('pages.public.register');
    }

    public function registerProcess(Request $request){
        $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|unique:users|max:255|email:dns',
            'password' => 'required|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $token = Str::random(128);
        
        //customer_id
        $date = Carbon::now();
        $start_rand = 100;
        $end_rand = rand(10000,99999);
        $result = $date->format('Y-m-d');
        $result = explode('-', $result);
        $result = implode("", $result);
        $customer_id = $start_rand.$result.$end_rand;
        
        $name = $request->name;
        $email = $request->email;

        $subscribe = Subscriber::where('email',$email)->first();
        if($subscribe){
            $subscribe->delete();
        }

        $user = new User;
        $user->create([
            'name' => $name,
            'email' => $email,
            'customer_id' => $customer_id,
            'password' => bcrypt($request->password) ,
            'role_id' => 2,
            'subscribe' => true,
            'token_verification' =>$token ,
            'email_verified' => false,
        ]);
        $data = [
            'title' => 'Email Verification',
            'name' => $name,
            'url' => route('verification',$token),
        ];
        Mail::to($email)->send(new Verification($data));

        $msg = 'Silahkan cek email untuk verifikasi';
        session()->flash('info', $msg);

        return redirect()->route('login');
    }

    // Login
    public function login(){
        return view('pages.public.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'=>'required|email:dns',
        	'password' => 'required|min:8',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = $request->has('remember');

        if(Auth::attempt($credentials, $remember)) {
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
                'subscribe' => true,
                'email_verified_at' => Carbon::now(),
            ]);
            $log = 'Email berhasil diverifikasi';
        }else{
            $log = 'Email sudah diverifikasi';
        }
        return view('pages.mail.email-verification-success',compact('user','log'));
   }

   public function forgetPassword(){
        return view('pages.public.forget-password');  
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
        return view('pages.public.request-otp');
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

        $msg = 'Silahkan cek email Anda untuk mendapatkan informasi Kode OTP';
        session()->flash('info', $msg);

        return redirect()->route('forgetPassword');
   }

    //profile debug
    public function profile(){
        $user = Auth::user();
        dd($user);
    }
}
