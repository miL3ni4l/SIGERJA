<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Anggota;
use App\Acara;
use App\User;
use App\TransNikah;
// use App\Gerwil;
use App\Talenta;
use App\Jabatan;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Check User Yang Belum Menjadi Anggota
        // if(Auth::user()->level == 'user'){
        //    $users = Anggota::where('id', Auth::user()->anggota->id);
           
        // } 
   
        
        //cara menampilkan jumlah donasi  

        //    <h3 class="font-weight-medium text-danger mb-0">{{$transaksis1-> $datas2 -> where('status', 'lunas')->count()}}</h3>

        //  <h3 class="font-weight-medium text-danger mb-0">{{$datas1->where('anggota_id', Auth::user()->Anggota->id)->count()}}</h3>
        $q = Transaksi::query();
        if(Auth::user()->level == 'user')
        {
            $q->where('anggota_id', Auth::user()->Anggota->id);
        }
        $datas1 = $q->get(); 
        // $datas1 = Transaksi::sum('total_donasi');
        
        $anggotas = Anggota::count(); 
        $acaras = Acara::count();

        $transaksis = Transaksi::sum('total_donasi');
        
        $transaksi = Transaksi::get();
        $transaksi1 = Transaksi::count();

        // 9
        $datas2 =  Transaksi::sum('total_donasi');

        $user = User::get();

        // $gerwils   = Gerwil::get();
        $talentas  = Talenta::get();
        $jabatans   = Jabatan::get();

        $anggota   = Anggota::get();

        $transnikah = TransNikah::get();

        if(Auth::user()->level == 'user')
        {
            $datas = Transaksi::where('status', 'belum')
                                ->where('anggota_id', Auth::user()->Anggota->id)
                                ->get();
        } else {
            $datas = Transaksi::where('status', 'belum')->get();
        }
        return view('layouts.dashboard',array('jabatan' => $jabatans, 'transnikah' => $transnikah, 'talenta' => $talentas, 'anggota' => $anggota, 'anggotas' => $anggotas, 'transaksi' => $transaksi, 'acaras' => $acaras, 'transaksis' => $transaksis, 'user' => $user,'datas' => $datas, 'transaksi1' => $transaksi1 , 'q' => $q , 'datas1' => $datas1,  'datas2' => $datas2
        ));
    
        

    }
}
    