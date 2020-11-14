<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Acara;
use App\Anggota;
use App\Transnikah;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransnikahController extends Controller
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
        $q = TransNikah::query();
        // if(Auth::user()->level == 'user')
        // {
        //     $q->where('jemaat_id',  Auth::user()->Anggota->id);
        //     $q->where('istri_id',  Auth::user()->Anggota->id);
        // }
        // $datas1 = $q->get();

        $transnikah = TransNikah::get();
        $anggota   = Anggota::all();
        
        
        // if(Auth::user()->level == 'user') 
        // { 
        //     $datas = TransNikah::where('jemaat_id', Auth::user()->anggota->id)->get();
        //     $datas = TransNikah::where('istri_id', Auth::user()->anggota->id)->get();
        // } else {
        //     $datas = TransNikah::get();
        // } 
        
        // return view('Talenta.index', compact('datas'));
        // return view('transnikah.index', compact('transnikah', 'anggota'));
        return view('transnikah.index', array('transnikah'=> $transnikah , 'anggota' => $anggota));

        // return view('transnikah.index', array('transnikah'=> $transnikah , 'anggota' => $anggota, 'datas'=>$datas, 'datas1'=> $datas));
        //  return view('transnikah.index' , ['transnikah' => $transnikah, 'anggota' => $anggota, 'datas'=>$datas, 'datas1'=> $datas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotas = Anggota::get();
        return view('transnikah.create', compact('anggotas'));    
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
            'kode' => 'required|string|max:255',
            'jemaat_id' => 'required',
            'istri_id' => 'required',
            
        ]);

        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/TransNikah", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        } 
        
        TransNikah::create($request->all());

        // Transnikah::create([
                 
        //         'kode' => $request->get('kode'),
        //         'anggota_id' => $request->get('anggota_id'),
        //         'istri_id' => $request->get('istri_id'),
        //         'pdt' => $request->get('pdt'),
        //         'jam' => $request->get('jam'),
        //         'tempat' => $request->get('tempat'),
        //         'tgl' => $request->get('tgl'),
        //         'cover' => $cover
        //     ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('transnikah.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {

    //     $data = Transnikah::findOrFail($id);


    //     if((Auth::user()->level == 'user') && (Auth::user()->anggota->id != $data->anggota_id)) {
    //             Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
    //             return redirect()->to('/');
    //     }


    //     return view('transnikah.show', compact('data'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Transnikah::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->anggota->id != $data->anggota_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        $acaras = Acara::where('jumlah_acara', '>', 0)->get();
        $kode = Transnikah::get();
        $anggotas = Anggota::get();
        return view('transnikah.edit1', compact('acaras','data', 'kode', 'anggotas'));
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
        $transnikah = Transnikah::find($id);

        $transnikah->update([
                'status' => 'lunas'
                ]);

        $transnikah->acara->where('id', $transnikah->acara->id)
                        ->update([
                            'jumlah_acara' => ($transnikah->acara->jumlah_acara + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('transnikah.index');
    }

    //TAMBAHAN
    public function edit1($id)
    {   
        
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Transnikah::findOrFail($id);
        $users = User::get();
        return view('transnikah.edit', compact('data', 'users'));
    }

    public function update1(Request $request, $id)
    {
        $transnikah = Transnikah::find($id);

        $transnikah->update([
                'status' => 'lunas'
                ]);

        $transnikah->acara->where('id', $transnikah->acara->id)
                        ->update([
                            'jumlah_acara' => ($transnikah->acara->jumlah_acara + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('transnikah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transnikah::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('transnikah.index');
    }
}
