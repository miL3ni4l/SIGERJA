<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\acara;
use App\Jemaat;
use App\Transaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
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

    public function acara()
    {
        return view('laporan.acara');
    }

    public function acaraPdf()
    {

        $datas = acara::all();
        $pdf = PDF::loadView('laporan.acara_pdf', compact('datas'));
        return $pdf->download('laporan_acara_'.date('Y-m-d_H-i-s').'.pdf');
    }



    public function transaksi()
    {

        return view('laporan.transaksi');
    }


    public function transaksiPdf(Request $request)
    {
        $q = Transaksi::query();

        if($request->get('status')) 
        {
             if($request->get('status') == 'belum') {
                $q->where('status', 'belum');
            } else {
                $q->where('status', 'lunas');
            }
        }

        if(Auth::user()->level == 'user')
        {
            $q->where('jemaat_id', Auth::user()->Jemaat->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.transaksi_pdf', compact('datas'));
       return $pdf->download('laporan_transaksi_'.date('Y-m-d_H-i-s').'.pdf');
    }

    //exsport JEMAAT DAN SIMPATISAN
    public function jemaat()
    {

        return view('laporan.jemaat');
    }

    public function jemaatPdf(Request $request)
    {
        $q = Jemaat::query();

        if($request->get('sts_jemaat')) 
        {
             if($request->get('sts_jemaat') == 'jemaat') {
                $q->where('sts_jemaat', 'jemaat');
            } else {
                $q->where('sts_jemaat', 'simpatisan');
            }
        }

        if(Auth::user()->level == 'user')
        {
            $q->where('jemaat_id', Auth::user()->Jemaat->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.jemaat_pdf', compact('datas'));
       return $pdf->download('laporan_jemaat_'.date('Y-m-d_H-i-s').'.pdf');
    }

    //exsport Gerakan Wilayah
    public function gerwil()
    {

        return view('laporan.gerwil');
    }

    public function gerwilPdf(Request $request)
    {
        $q = Jemaat::query();

        // if($request->get('gerwil')) 
        // {
        //      if($request->get('gerwil') == 'jemaat') 
        //     {
        //         else {
        //         $q->where('gerwil', 'Utara');
        //     }
        // }
        

        if(Auth::user()->level == 'user')
        {
            $q->where('jemaat_id', Auth::user()->Jemaat->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.gerwil_pdf', compact('datas'));
       return $pdf->download('laporan_gerwil_'.date('Y-m-d_H-i-s').'.pdf');
    }
}

