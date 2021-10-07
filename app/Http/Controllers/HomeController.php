<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    public function index(){
        return view('Home');
    }

    public function adminIndex(){
      $user_id = Auth::user()->id;
      $sudahpresensi = Presensi::whereNotNull('jammasuk')->whereDate('created_at', Carbon::today())->get();
      $belumpresensi = Presensi::whereNull('jammasuk')->whereDate('created_at', Carbon::today())->get();
      $terlambat = Presensi::where('jammasuk','>','08:30:59')->whereDate('created_at', Carbon::today())->get();
      $totkaryawan = User::where('level','=',"karyawan")->get();
      return view('Home-admin',compact('sudahpresensi','belumpresensi','terlambat','totkaryawan'));
    }
}
