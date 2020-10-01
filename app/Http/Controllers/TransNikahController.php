<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Acara;
use App\Jemaat;
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

        $q = Transnikah::query();
        if(Auth::user()->level == 'user')
        {
            $q->where('suami_id', 'istri_id', Auth::user()->Jemaat->id);
        }
        $datas1 = $q->get();
        
        $transnikah = Transnikah::get();
        $jemaat   = Jemaat::get();
        
        
        if(Auth::user()->level == 'user') 
        { 
            $datas = Transnikah::where('suami_id', 'istri_id', Auth::user()->jemaat->id)
                                ->get();
        } else {
            $datas = Transnikah::get();
        }

         
        // return view('transnikah.index', compact('datas'));
        return view('transnikah.index', compact('transnikah', 'jemaat', 'datas', 'datas1'));

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
     if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $jemaats = Jemaat::get();
        return view('transnikah.create', compact('jemaats'));

       
        
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
            'suami_id' => 'required',
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

        Transnikah::create([
                 
                'kode' => $request->get('kode'),
                'suami_id' => $request->get('suami_id'),
                'istri_id' => $request->get('istri_id'),
                'pdt' => $request->get('pdt'),
                'jam' => $request->get('jam'),
                'tempat' => $request->get('tempat'),
                'tgl' => $request->get('tgl'),
                'cover' => $cover
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('transnikah.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Transnikah::findOrFail($id);


        if((Auth::user()->level == 'user') && (Auth::user()->jemaat->id != $data->jemaat_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }


        return view('transnikah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Transnikah::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->jemaat->id != $data->jemaat_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        $acaras = Acara::where('jumlah_acara', '>', 0)->get();
        $kode = Transnikah::get();
        $jemaats = Transnikah::get();
        return view('transnikah.edit1', compact('acaras','data', 'kode', 'jemaats'));
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
