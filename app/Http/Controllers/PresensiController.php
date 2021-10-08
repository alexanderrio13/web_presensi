<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function keluar()
    {
        return view('Presensi.Keluar');
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

        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        if ($presensi){
            dd("Anda sudah presensi masuk");
        }else{
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }


        return redirect('laman-presensi');
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


    public function tampildatakeseluruhan(Request $req)
    {
        // $user_id = Auth::user()->id;
        $presensi = Presensi::with('user')->whereBetween('tgl',[$req->get('tglawal'), $req->get('tglakhir')])->where('user_id',$req->get('user_id'))->orderBy('tgl','asc','user_id')->get();
        return view('Presensi.Rekap-karyawan',compact('presensi'));
    }

    public function tampildataperkaryawan()
    {
        $user_id = Auth::user()->id;
        $presensi = Presensi::with('user')->where('user_id',$user_id)->get();
        return view('Presensi.Rekap-per-karyawan',compact('presensi'));
    }


    public function presensipulang(){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();

        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == ""){
            $presensi->update($dt);
            return redirect('laman-presensi');
        }else{
            dd("Anda sudah presensi pulang");
        }
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
