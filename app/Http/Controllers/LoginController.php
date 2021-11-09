<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Mail;
use DateTime;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('Login.Login-aplikasi');
    }


    public function postlogin(Request $request){

        $remember_me = $request->remember_token ? true : false;
        $errors = new MessageBag;
        $credentials = [
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
        ];
        if(Auth::attempt($request->only('email','password'),$remember_me)){
          Auth::user()->last_login_at = new DateTime();
          Auth::user()->last_login_ip = request()->getClientIp();
          Auth::user()->save();
          if (auth()->user()->level == "administrator"){
            return redirect('/admin-dashboard')->with('alert-success', 'You are now logged in.');;
          }
            return redirect('/home')->with('alert-success', 'You are now logged in.');;
        }
              $errors = new MessageBag(['password' => ['Invalid username or password.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

        return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
        // return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/login');
    }

    public function registrasi(){
        return view('Login.registrasi');
    }

    public function simpanregistrasi(Request $request){
        // dd($request->all());

        User::create([
            'name' => $request->name,
            'level' => 'karyawan',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => Str::random(60),
        ]);

        return view('Login.Login-aplikasi');

    }

    public function forgotPassword(){
       return view('Login.forgot-password');
   }

    public function forgotPasswordValidate($token){
        $user = User::where('token', $token)->first();
        if ($user) {
            $email = $user->email;
            return view('Login.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    public function resetPassword(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('failed', 'Failed! email is not registered');
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token));

        if(Mail::failures() != 0) {
            return back()->with('success', 'Success! password reset link has been sent, please check your inbox!');
        }
        return back()->with('failed', 'Failed! there is some issue with email provider');
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['token'] = '';
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Success! password has been changed');
        }
        return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
    }
}
