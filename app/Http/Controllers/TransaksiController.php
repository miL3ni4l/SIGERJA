<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Acara;
use App\Jemaat;
use App\Transaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
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

        $q = Transaksi::query();
        if(Auth::user()->level == 'user')
        {
            $q->where('jemaat_id', Auth::user()->Jemaat->id);
        }
        $datas1 = $q->get();

        $transaksi = Transaksi::get();
        $jemaat   = Jemaat::get();
        $acara      = Acara::get();
        
        if(Auth::user()->level == 'user') 
        { 
            $datas = Transaksi::where('jemaat_id', Auth::user()->jemaat->id)
                                ->get();
        } else {
            $datas = Transaksi::get();
        } 
        // return view('transaksi.index', compact('datas'));
        return view('transaksi.index', compact('transaksi', 'jemaat', 'acara', 'datas', 'datas1'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $getRow = Transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "GN00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "GN0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "GN000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "GN00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "GN0".''.($lastId->id + 1);
            } else {
                    $kode = "GN".''.($lastId->id + 1);
            }
        }

        $acaras = Acara::where('jumlah_acara', '>', 0)->get();
        $jemaats = Jemaat::get();
        return view('transaksi.create', compact('acaras', 'kode', 'jemaats'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'tgl_transaksi' => 'required',
            'jml_donasi' => 'required',
            'bank' => 'required',
            'rek' => 'required',
            'total_donasi' => 'required',
            'ket' => 'required',
            'acara_id' => 'required',
            'jemaat_id' => 'required',
            

        ]);

        if($request->file('bukti')) {
            $file = $request->file('bukti');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('bukti')->move("images/Acara", $fileName);
            $bukti = $fileName;
        } else {
            $bukti = NULL;
        }

        $transaksi = Transaksi::create([
                'kode_transaksi' => $request->get('kode_transaksi'),
                'tgl_transaksi' => $request->get('tgl_transaksi'),
                'jml_donasi' => $request->get('jml_donasi'),
                'bank' => $request->get('bank'),
                'rek' => $request->get('rek'),
                'total_donasi' => $request->get('total_donasi'),
                'ket' => $request->get('ket'),
                'acara_id' => $request->get('acara_id'),
                'jemaat_id' => $request->get('jemaat_id'),
                'status' => 'belum',
                'bukti' => $bukti
            ]);

        $transaksi->acara->where('id', $transaksi->acara_id)
                        ->update([
                            'jumlah_acara' => ($transaksi->acara->jumlah_acara - 1),
                            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Transaksi::findOrFail($id);


        if((Auth::user()->level == 'user') && (Auth::user()->jemaat->id != $data->jemaat_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }


        return view('transaksi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Transaksi::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->jemaat->id != $data->jemaat_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        $acaras = Acara::where('jumlah_acara', '>', 0)->get();
        $kode = Transaksi::get();
        $jemaats = Transaksi::get();
        return view('transaksi.edit1', compact('acaras','data', 'kode', 'jemaats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if($request->file('bukti')) {
            $file = $request->file('bukti');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('bukti')->move("images/acara", $fileName);
            $bukti = $fileName;
        } else {
            $bukti = NULL;
        }
        $transaksi = Transaksi::find($id);

        $transaksi->update([
                'status' => 'lunas'
                ]);

        $transaksi->acara->where('id', $transaksi->acara->id)
                        ->update([
                            'jumlah_acara' => ($transaksi->acara->jumlah_acara + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('transaksi.index');
    }

    //TAMBAHAN
    public function edit1($id)
    {   
        
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Transaksi::findOrFail($id);
        $users = User::get();
        return view('transaksi.edit', compact('data', 'users'));
    }

    public function update1(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->update([
                'status' => 'lunas'
                ]);

        $transaksi->acara->where('id', $transaksi->acara->id)
                        ->update([
                            'jumlah_acara' => ($transaksi->acara->jumlah_acara + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('transaksi.index');
    }
}
