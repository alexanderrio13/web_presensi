<?php

namespace App\Http\Controllers;

use Auth;
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
        if(Auth::attempt($request->only('email','password'))){
          if (auth()->user()->level == "admin"){
            return redirect('/admin-dashboard');
          }
            return redirect('/home');
        }
        $errors = new MessageBag;
        $credentials = [
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
        ];
        if (Auth::attempt($credentials)) // use the inbuilt Auth::attempt method to log in the user ( if the credentials are wrong, this will fail )
        return Redirect::to('account')->with('alert-success', 'You are now logged in.'); // if the credentials were correct, Auth::attempt will log in the user automatically and you can redirect the user to the intended page. Moreover, using the ->with() method, you can store a message in a session, which can be accessed on the next page. (se explanation under)

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
            'remember_token' => Str::random(60),
        ]);

        return view('Login.Login-aplikasi');

    }
}
