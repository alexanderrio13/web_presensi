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
}
