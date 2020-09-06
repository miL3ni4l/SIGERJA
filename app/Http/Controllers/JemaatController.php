<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jemaat;
use App\Talenta;
use App\Jabatan;
use App\Gerwil;
use App\TransNikah;
use Carbon\Carbon;
use Session;    
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class JemaatController extends Controller
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
 
        
        $jemaats   = Jemaat::get();
        $datas = Jemaat::get();
         return view('jemaat.index',array('jemaat' => $jemaats, 'datas' => $datas, 'gerwil' => $gerwils, 'jabatan' => $jabatans, 'talenta' => $talentas));
        // return view('jemaat.index', compact('datas', 'jemaat', 'gerwil'));
    }


    public function create()
    {
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }

        $getRow = Jemaat::orderBy('id', 'DESC')->get();
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
        //                 ->from('jemaat')
        //                 ->whereRaw('jemaat.user_id = users.id');
        //              })->get();

        $gerwils = Gerwil::get();
        $jabatans = Jabatan::get();
        $talentas = Talenta::get();
        $jemaats = Jemaat::get();
        return view('jemaat.create', compact('kode', 'gerwils', 'talentas', 'jemaats', 'jabatans'));

    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Jemaat::where('kode_jemaat',$request->input('kode_jemaat'))->count();

        // if($count>0){
        //     Session::flash('message', 'Already exist!');
        //     Session::flash('message_type', 'danger');
        //     return redirect()->to('jemaat');
        // }

        $this->validate($request, [
            // 'kode_jemaat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'gerwil' => 'required',
            // 'nij' => 'required|string|max:20|unique:jemaat',
            // 'sts_keluarga' => 'required',
            // 'jk' => 'required',
            // 'tempat_lahir' => 'required',
            // 'tgl_lahir' => 'required',
            // 'agama' => 'required',
            // 'alamat' => 'required',
            // 'hp' => 'required',
            // 'sts_jemaat' => 'required',
            // 'gerwil_id' => 'required',
            // 'jabatan_id' => 'required',
            // 'talenta_id' => 'required',
        ]);
         
        Jemaat::create($request->all());
    //    $jemaat = Jemaat::create([
    //             'nama' => $request->get('nama'),
    //             'nij' => $request->get('nij'),
    //             'gerwil_id' => $request->get('gerwil_id'),
    //             'talenta_id' => $request->get('talenta_id'),
    //             'jabatan_id' => $request->get('jabatan_id')
    //         ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('jemaat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $data = Jemaat::findOrFail($id);
       
        // if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
        //         Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //         return redirect()->to('/');
        // }

        

        return view('jemaat.show', compact('data'));
        
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

        $data = Jemaat::findOrFail($id);
        //$users = User::get();
        return view('jemaat.edit', compact('data'));
        // $gerwils = Gerwil::get();
        // $jabatans = Jabatan::get();
        // $talentas = Talenta::get();
        // return view('jemaat.create', compact('users', 'data', 'gerwils', 'talentas', 'jabatans'));
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
        Jemaat::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('jemaat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jemaat::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('jemaat.index');
    }
}
