<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\anggota;
use App\Nikah;
use App\Jabatan;
use App\Gerwil;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class NikahController extends Controller
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
        $q = Nikah::query();
        // if(Auth::user()->level == 'user')
        // {
        //     $q->where('anggota_id', Auth::user()->anggota->id);
        // }
        $datas1 = $q->get();

        $nikah = Nikah::get();
        $anggota   = Anggota::get();
        
        
        // if(Auth::user()->level == 'user') 
        // { 
        //     $datas = Nikah::where('anggota_id', Auth::user()->anggota->id)
        //                         ->get();
        // } else {
        //     $datas = Nikah::get();
        // } 
        // return view('Nikah.index', compact('datas'));
        return view('nikah.index', compact('nikah', 'anggota', 'datas1'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {         
        $anggotas = anggota::get();
        

        return view('nikah.create' , compact('anggotas'));
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
           
            'anggota_id' => 'required',
            'istri_id' => 'required',
            // 'nama_nikah' => 'required',
        ]); 
        Nikah::create($request->all());
        
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('nikah.index');
        // return redirect()->back();

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Nikah::findOrFail($id);
        return view('Nikah.edit', compact('data'));
    }

     public function show($id)
    {   $data = Nikah::findOrFail($id);
    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        
        $anggotas = anggota::get();

        return view('nikah.show', compact('data', 'anggotas'));
        
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
        Nikah::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('nikah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nikah::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('nikah.index');
    }
}
