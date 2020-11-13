<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Anggota;
use App\Talenta;
use App\Jabatan;
use App\Gerwil;
// use App\TransNikah;
use Carbon\Carbon;
use Session;    
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
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
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        } 
        $gerwils   = Gerwil::get();
        $talentas  = Talenta::get();
        $jabatans   = Jabatan::get();
 
        
        $anggotas   = Anggota::get();
        $datas = Anggota::get();
         return view('anggota.index',array('anggota' => $anggotas, 'datas' => $datas, 'gerwil' => $gerwils, 'jabatan' => $jabatans, 'talenta' => $talentas));
        // return view('anggota.index', compact('datas', 'anggota', 'gerwil'));
    }


    public function create()
    {
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }

        $getRow = Anggota::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "NIJGN00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "NIJGN0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "NIJGN000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "NIJGN00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "NIJGN0".''.($lastId->id + 1);
            } else {
                    $kode = "NIJGN".''.($lastId->id + 1);
            }
        }
 
        // $users = User::WhereNotExists(function($query) {
        //                 $query->select(DB::raw(1))
        //                 ->from('anggota')
        //                 ->whereRaw('anggota.user_id = users.id');
        //              })->get();

        $gerwils = Gerwil::get();
        $jabatans = Jabatan::get();
        $talentas = Talenta::get();
        $anggotas = Anggota::get();
        return view('anggota.create', compact('kode', 'gerwils', 'talentas', 'anggotas', 'jabatans'));

    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Anggota::where('kode_anggota',$request->input('kode_anggota'))->count();

        // if($count>0){
        //     Session::flash('message', 'Already exist!');
        //     Session::flash('message_type', 'danger');
        //     return redirect()->to('anggota');
        // }

        $this->validate($request, [
            // 'kode_anggota' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'gerwil' => 'required',
            // 'nij' => 'required|string|max:20|unique:anggota',
            // 'sts_keluarga' => 'required',
            // 'jk' => 'required',
            // 'tempat_lahir' => 'required',
            // 'tgl_lahir' => 'required',
            // 'agama' => 'required',
            // 'alamat' => 'required',
            // 'hp' => 'required',
            // 'sts_Anggota' => 'required',
            // 'gerwil_id' => 'required',
            // 'jabatan_id' => 'required',
            // 'talenta_id' => 'required',
        ]);
         
        Anggota::create($request->all());
    //    $anggota = anggota::create([
    //             'nama' => $request->get('nama'),
    //             'nij' => $request->get('nij'),
    //             'gerwil_id' => $request->get('gerwil_id'),
    //             'talenta_id' => $request->get('talenta_id'),
    //             'jabatan_id' => $request->get('jabatan_id')
    //         ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('anggota.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $data = anggota::findOrFail($id);
       
        // if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
        //         Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //         return redirect()->to('/');
        // }

        

        return view('Anggota.show', compact('data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
        //         Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //         return redirect()->to('/');
        // }

        $data = Anggota::findOrFail($id);
        //$users = User::get();
        return view('anggota.edit', compact('data'));
        // $gerwils = Gerwil::get();
        // $jabatans = Jabatan::get();
        // $talentas = Talenta::get();
        // return view('anggota.create', compact('users', 'data', 'gerwils', 'talentas', 'jabatans'));
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
        Anggota::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('anggota.index');
    }
}