<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use DB;


class HomeController extends Controller
{
    public function index(){
        return view('Home');
    }

    public function adminIndex(){
      $user_id = Auth::user()->id;
      $sudahpresensi = Presensi::whereNotNull('jammasuk')->whereDate('created_at', Carbon::today())->get();
      $terlambat = Presensi::where('jammasuk','>','08:30:59')->whereDate('created_at', Carbon::today())->get();
      $karyawan = User::where('level','=',"karyawan")->get();
      return view('Home-admin',compact('sudahpresensi','terlambat','karyawan'));
    }

    public function hapus($id){
      DB::table('users')->where('id',$id)->delete();
      return redirect('admin-dashboard');
    }

    public function tambah(){
      return view('Tambah-karyawan');
    }

    public function store(Request $request){
      DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'jabatan' => $request->jabatan,
        'level' => $request->get('level')
      ]);
      return redirect('/admin-dashboard');
    }

    public function edit($id){
      $users = DB::table('users')->where('id', $id)->get();
      return view('Edit-karyawan',compact('users'));
    }

    public function update(Request $request){
      DB::table('users')->where('id',$request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'jabatan' => $request->jabatan,
        'level' => $request->get('level')
      ]);
      return redirect('/admin-dashboard');

    }

}
