<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Acara;
use App\Jemaat;
use App\Bank;
use App\Transaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ListController extends Controller
{
   public function index()
    {
    
         $acara = Acara::get();
         $banks = Bank::get();
        $datas = Acara::get();

         return view('list.acara',array('acara' => $acara, 'datas' => $datas, 'banks' => $banks));
    }

     public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Acara::findOrFail($id);
        $bank = Bank::get();
        $acara = Acara::get();

        return view('acara.show', compact('data', 'acara', 'bank'));
    }
     public function create()
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/list');
        }

        // $data = Acara::findOrFail($id);
        // $bank = Bank::get();
        // $acara = Acara::get();

        // return view('acara.show', compact('data', 'acara', 'bank'));
    }
    
}
