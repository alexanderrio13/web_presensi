<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Presensi;
use App\Models\User;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Log;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('auth');
     }

    public function index()
    {
        $user_id = Auth::user()->id;
        $presensi = Presensi::with('user')->where('user_id',$user_id)->whereDate('created_at', Carbon::today())->get();
        return view('Presensi.Presensi',compact('presensi'));
    }

    public function masuk()
    {
        $user_id = Auth::user()->id;
        $presensi = Presensi::with('user')->where('user_id',$user_id)->whereDate('created_at', Carbon::today())->get();
        return view('Presensi.Masuk',compact('presensi'));
    }

    public function keluar()
    {
        $user_id = Auth::user()->id;
        $presensi = Presensi::with('user')->where('user_id',$user_id)->whereDate('created_at', Carbon::today())->get();
        return view('Presensi.Keluar',compact('presensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $img =  $request->get('image_in');
        $folderPath = "Rioadi/uploads_in/";
        $image_parts = explode(";base64,", $img);

        foreach ($image_parts as $key => $image_in){
        $image_base64 = base64_decode($image_in);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        if ($presensi){
            Session::flash('warning','Anda sudah presensi masuk');
            return redirect('/laman-presensi');
        }else{
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
                'image_in' => $fileName,
            ]);
        }
        Session::flash('sukses','Data submitted Successfully');
        return redirect('/laman-presensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function halamanrekap()
    {
        $users = User::where('level','=','karyawan')->get();
        return view('Presensi.Halaman-rekap-karyawan',compact('users'));

    }

    public function rekapresult(Request $req)
    {

        $presensi = Presensi::with('user')->whereBetween('tgl',[$req->get('tglawal'), $req->get('tglakhir')])->where('user_id',$req->get('user_id'))->orderBy('tgl','asc','user_id')->get();
        // get hidden user id
        // $userId = $req->input('user_id');
        $users = User::where('level','=','karyawan')->get();
        return view('Presensi.Rekap-karyawan',compact('presensi','users'));
    }

    public function halamanrekapAll()
    {
        return view('Presensi.Halaman-rekap-karyawan-all');

    }

    public function rekapresultAll(Request $req)
    {

        $presensi = Presensi::with('user')->whereBetween('tgl',[$req->get('tglawal'), $req->get('tglakhir')])->orderBy('tgl','asc')->get();
        // get hidden user id
        // $userId = $req->input('user_id');
        $users = User::where('level','=','karyawan')->get();
        return view('Presensi.Rekap-karyawan-all',compact('presensi','users'));
    }

    public function history()
    {
        $user_id = Auth::user()->id;
        $presensi = Presensi::with('user')->where('user_id',$user_id)->get();
        $lembur = Lembur::with('user')->where('user_id',$user_id)->get();
        return view('Presensi.Rekap-per-karyawan',compact('presensi','lembur'));
    }


    public function presensipulang(Request $request){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $diff = "14:07:12";
        $img =  $request->get('image_out');
        $folderPath = "Rioadi/uploads_out/";
        $image_parts = explode(";base64,", $img);

        foreach ($image_parts as $key => $image_out){
        $image_base64 = base64_decode($image_out);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();

        $dt=[
            'jamkeluar' => $localtime,
            'image_out' => $fileName,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk) - strtotime($diff))
        ];

        if ($presensi->jamkeluar == ""){
            $presensi->update($dt);
            Session::flash('sukses','Data submitted Successfully');
            return redirect('/laman-presensi');
        }else{
            Session::flash('warning','Anda sudah presensi pulang');
            return redirect('/laman-presensi');
        }
    }

    public function lembur(){
      $user_id = Auth::user()->id;
      return view('Presensi.Form-lembur',compact('user_id'));
    }

    public function lemburstore(Request $request){
      $timezone = 'Asia/Jakarta';
      $date = new DateTime('now', new DateTimeZone($timezone));
      $diff = "14:07:00";
      DB::table('lemburs')->insert([
        'user_id' => $request->get('user_id'),
        'tgl' => $request->tgl,
        'lemburmasuk' => $request->lemburmasuk,
        'lemburkeluar' => $request->lemburkeluar,
        'statuslembur' => $request->statuslembur,
        'desc_lembur' => $request->desc_lembur,
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'lamalembur' => date('H:i', strtotime($request->lemburkeluar) - strtotime($request->lemburmasuk) - strtotime($diff))

      ]);

      return redirect('/history');
    }

    public function rekaplembur(){
      $lembur = Lembur::with('user')->get();
      return view('Presensi.Rekap-lembur-karyawan',compact('lembur'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
