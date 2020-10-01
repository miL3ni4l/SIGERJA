<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jemaat;
use App\Talenta;
use App\Jabatan;
use App\Gerwil;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TalentaController extends Controller
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
        $q = Talenta::query();
        if(Auth::user()->level == 'user')
        {
            $q->where('jemaat_id', Auth::user()->Jemaat->id);
        }
        $datas1 = $q->get();

        $talenta = Talenta::get();
        $jemaat   = Jemaat::get();
        
        
        if(Auth::user()->level == 'user') 
        { 
            $datas = Talenta::where('jemaat_id', Auth::user()->jemaat->id)
                                ->get();
        } else {
            $datas = Talenta::get();
        } 
        // return view('Talenta.index', compact('datas'));
        return view('talenta.index', compact('talenta', 'jemaat', 'datas', 'datas1'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {         
        $jemaats = Jemaat::get();
        

        return view('talenta.create' , compact('jemaats'));
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
           
            'jemaat_id' => 'required',
            'nama_talenta' => 'required',
        ]); 
        Talenta::create($request->all());

        // if (!empty($request->input('nama_talenta'))) {
        //     $checkbox = join(',' ,$request->input('nama_talenta'));
        //     \DB::table('talentas')->insert(['nama_talenta'=>$checkbox]);
        // } else {
        //     $checkbox = '';
        // }
        
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('talenta.index');
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

        $data = Talenta::findOrFail($id);
        return view('Talenta.edit', compact('data'));
    }

     public function show($id)
    {   $data = Talenta::findOrFail($id);
    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        
        $jemaats = Jemaat::get();

        return view('talenta.show', compact('data', 'jemaats'));
        
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
        Talenta::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('talenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Talenta::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('talenta.index');
    }
}
