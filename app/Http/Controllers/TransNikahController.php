<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Acara;
use App\Jemaat;
use App\TransNikah;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransNikahController extends Controller
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
        if(Auth::user()->level == 'user')
        {
            $q->where('suami_id', Auth::user()->Jemaat->id);
        }
        $datas1 = $q->get();

        $trans = TransNikah::get();
        $jemaat   = Jemaat::get();

        
        if(Auth::user()->level == 'user') 
        {
            $datas = TransNikah::where('suami_id', Auth::user()->jemaat->id) 
                                ->get();
        } else {
            $datas = TransNikah::get();
        }
        // return view('transaksi.index', compact('datas'));
        return view('transnikah.index', compact('trans', 'jemaat', 'datas', 'datas1'));
        

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

        TransNikah::create([
                 
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

        $data = TransNikah::findOrFail($id);


        if((Auth::user()->level == 'user') && (Auth::user()->jemaat->id != $data->jemaat_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }


        return view('TransNikah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = TransNikah::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->jemaat->id != $data->jemaat_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        $acaras = Acara::where('jumlah_acara', '>', 0)->get();
        $kode = TransNikah::get();
        $jemaats = TransNikah::get();
        return view('TransNikah.edit1', compact('acaras','data', 'kode', 'jemaats'));
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
        $TransNikah = TransNikah::find($id);

        $TransNikah->update([
                'status' => 'lunas'
                ]);

        $TransNikah->acara->where('id', $TransNikah->acara->id)
                        ->update([
                            'jumlah_acara' => ($TransNikah->acara->jumlah_acara + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('TransNikah.index');
    }

    //TAMBAHAN
    public function edit1($id)
    {   
        
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = TransNikah::findOrFail($id);
        $users = User::get();
        return view('TransNikah.edit', compact('data', 'users'));
    }

    public function update1(Request $request, $id)
    {
        $TransNikah = TransNikah::find($id);

        $TransNikah->update([
                'status' => 'lunas'
                ]);

        $TransNikah->acara->where('id', $TransNikah->acara->id)
                        ->update([
                            'jumlah_acara' => ($TransNikah->acara->jumlah_acara + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('TransNikah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TransNikah::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('transnikah.index');
    }
}
