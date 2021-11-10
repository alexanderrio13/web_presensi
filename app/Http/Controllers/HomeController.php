<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use App\Models\Report;
use Carbon\Carbon;
use Auth;
use DB;


class HomeController extends Controller
{
    public function index(){
      $user_id = Auth::user()->id;
      $user = User::find($user_id);
      $reports = Report::with('user')->where('user_id',$user_id)->get();
      // user_id di define biar bisa get di store methods
      return view('Home',compact('user','reports','user_id'));
    }

    public function updateAccount(Request $request)
    {
      $id = Auth::user()->id;
      $user = User::find($id);
      if ($user->password != $request->input('password')){
        $user->password = bcrypt($request->password);
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->ttl = $request->input('ttl');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->save();
      }
      else {
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->ttl = $request->input('ttl');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->save();
      }
      // $user->email = $request->input('email');
      // $user->password = bcrypt($request->input('password'));
      // $user->phone = $request->input('phone');
      // $user->ttl = $request->input('ttl');
      // $user->address = $request->input('address');
      // $user->gender = $request->input('gender');
      // $user->save();
      return redirect('/home');
    }

    public function updateNote(Request $request)
    {
      $id = Auth::user()->id;
      $user = User::find($id);
      $user->note = $request->input('note');
      $user->save();
      return redirect('/home');
    }

    public function reportStore(Request $request)
    {

      $user_id = Auth::user()->id;
      $report = new Report;
      $report->user_id = $request->get('user_id');
      $report->subject = $request->addSubject;
      $report->content = $request->addContent;
      $report->status = $request->addStatus;
      $report->save();
      return redirect('/home');

    }

    public function reportDestroy($id){
      DB::table('reports')->where('id',$id)->delete();
      return redirect('/home');
    }

    public function reportEdit(Request $request, $id){
      $report = Report::find($id);
      $report->subject = $request->editSubject;
      $report->content = $request->editContent;
      $report->status = $request->editStatus;
      $report->save();
      return redirect('/home');

    }

    public function adminIndex(){
      $user_id = Auth::user()->id;
      $today_presensi = Presensi::whereNotNull('jammasuk')->whereDate('created_at', Carbon::today())->get();
      $today_terlambat = Presensi::where('jammasuk','>','08:30:59')->whereDate('created_at', Carbon::today())->get();
      $tot_karyawan = User::where('level','=',"karyawan")->get();

      $month = ['September', 'October', 'November', 'December', 'January', 'February'];
      $terlambat = [];
      foreach ($month as $key => $value) {
          $terlambat[] = Presensi::where(DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->where('jammasuk','>','08:30:59')->count();
      }
      $ontime = [];
      foreach ($month as $key => $value) {
          $ontime[] = Presensi::where(DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->where('jammasuk','<','08:31:00')->count();
      }
      $null_pulang = [];
      foreach ($month as $key => $value) {
          $null_pulang[] = Presensi::where(DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->whereNull('jamkeluar')->count();
      }
      return view('Home-admin',compact('today_presensi','today_terlambat','tot_karyawan'))
              ->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('terlambat',json_encode($terlambat,JSON_NUMERIC_CHECK))
              ->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('ontime',json_encode($ontime,JSON_NUMERIC_CHECK))
              ->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('null_pulang',json_encode($null_pulang,JSON_NUMERIC_CHECK));

              // ->with('click',json_encode($click,JSON_NUMERIC_CHECK))

      // return view('Home-admin',compact('sudahpresensi','terlambat','karyawan'));
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
        'level' => $request->get('level'),
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
      ]);
      return redirect('/admin-dashboard');
    }

    public function edit($id){
      $users = DB::table('users')->where('id', $id)->get();
      return view('Edit-karyawan',compact('users'));
    }

    public function update(Request $request){
      $user = User::where('id','=',$request->id)->get()->first();
      if ($user->password != $request->get('password')){
        $user->password = bcrypt($request->password);
        $user->name = $request->get('name');
        $user->jabatan = $request->get('jabatan');
        $user->email = $request->get('email');
        $user->level = $request->get('level');
        $user->save();
      }
      else {
        $user->name = $request->get('name');
        $user->jabatan = $request->get('jabatan');
        $user->email = $request->get('email');
        $user->level = $request->get('level');
        $user->save();
      }

      // DB::table('users')->where('id',$request->id)->update([
      //   'name' => $request->name,
      //   'email' => $request->email,
      //   'password' => if (bcrypt($request->password) != bcrypt($request->get('password'))),
      //   'jabatan' => $request->jabatan,
      //   'level' => $request->get('level')
      // ]);
      return redirect('/admin-dashboard');

    }

}
