<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Jemaat;
use App\Acara;
use App\User;
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
        //    $users = Jemaat::where('id', Auth::user()->jemaat->id);
           
        // } 
   
        
        //cara menampilkan jumlah donasi  

        //    <h3 class="font-weight-medium text-danger mb-0">{{$transaksis1-> $datas2 -> where('status', 'lunas')->count()}}</h3>

        //  <h3 class="font-weight-medium text-danger mb-0">{{$datas1->where('jemaat_id', Auth::user()->Jemaat->id)->count()}}</h3>
        $q = Transaksi::query();
        if(Auth::user()->level == 'user')
        {
            $q->where('jemaat_id', Auth::user()->Jemaat->id);
        }
        $datas1 = $q->get(); 
        // $datas1 = Transaksi::sum('total_donasi');
        
        $jemaats = Jemaat::count();
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

        $jemaat   = Jemaat::get();

        if(Auth::user()->level == 'user')
        {
            $datas = Transaksi::where('status', 'belum')
                                ->where('jemaat_id', Auth::user()->Jemaat->id)
                                ->get();
        } else {
            $datas = Transaksi::where('status', 'belum')->get();
        }
        return view('layouts.dashboard',array('jabatan' => $jabatans, 'talenta' => $talentas, 'jemaat' => $jemaat, 'jemaats' => $jemaats, 'transaksi' => $transaksi, 'acaras' => $acaras, 'transaksis' => $transaksis, 'user' => $user,'datas' => $datas, 'transaksi1' => $transaksi1 , 'q' => $q , 'datas1' => $datas1,  'datas2' => $datas2
        ));
    
        

    }
}
    