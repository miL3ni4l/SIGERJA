@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("acara_judul").value = $(this).attr('data-acara_judul');
                document.getElementById("acara_id").value = $(this).attr('data-acara_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_jemaat', function (e) {
                document.getElementById("jemaat_id").value = $(this).attr('data-jemaat_id');
                document.getElementById("jemaat_nama").value = $(this).attr('data-jemaat_nama');
                $('#myModal2').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('transnikah.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Donasi baru</h4>
                    
                        <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                            <label for="kode_transaksi" class="col-md-4 control-label">Kode Donasi</label>
                            <div class="col-md-6">
                                <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                                @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('tgl_transaksi') ? ' has-error' : '' }}">
                            <label for="tgl_transaksi" class="col-md-4 control-label">Tanggal Donasi</label>
                            <div class="col-md-6">
                                <input id="tgl_transaksi" type="date" class="form-control" name="tgl_transaksi" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('acara_id') ? ' has-error' : '' }}">
                            <label for="acara_id" class="col-md-4 control-label">Acara</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="acara_judul" type="text" class="form-control" readonly="" required>
                                <input id="acara_id" type="hidden" name="acara_id" value="{{ old('acara_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('acara_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acara_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        

                        @if(Auth::user()->level == 'admin')
                        <div class="form-group{{ $errors->has('jemaat_id') ? ' has-error' : '' }}">
                            <label for="jemaat_id" class="col-md-4 control-label">Jemaat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="jemaat_nama" type="text" class="form-control" readonly="" required>
                                <input id="jemaat_id" type="hidden" name="jemaat_id" value="{{ old('jemaat_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('jemaat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jemaat_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('jemaat_id') ? ' has-error' : '' }}">
                            <label for="jemaat_id" class="col-md-4 control-label">Jemaat</label>
                            <div class="col-md-6">
                                <input id="jemaat_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->jemaat->nama}}" required>
                                <input id="jemaat_id" type="hidden" name="jemaat_id" value="{{ Auth::user()->jemaat->id }}" required readonly="">
                              
                                @if ($errors->has('jemaat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jemaat_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @endif

                        
                        

                        <div class="form-group{{ $errors->has('jml_donasi') ? ' has-error' : '' }}">
                            <label for="jml_donasi" class="col-md-4 control-label">Jenis Donasi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jml_donasi" required="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value="Uang">Uang</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('total_donasi') ? ' has-error' : '' }}">
                            <label for="total_donasi" class="col-md-4 control-label">Total Donasi</label>
                            <div class="col-md-6">
                                <input id="total_donasi" type="number" class="form-control" name="total_donasi" value="{{ old('total_donasi') }}">
                                @if ($errors->has('total_donasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total_donasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
   
                        <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                            <label for="bank" class="col-md-4 control-label">Bank</label>
                            <div class="col-md-6">
                                <input id="bank" type="text" class="form-control" name="bank" value="{{ old('bank') }}">
                                @if ($errors->has('bank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rek') ? ' has-error' : '' }}">
                            <label for="rek" class="col-md-4 control-label">No Rekening</label>
                            <div class="col-md-6">
                                <input id="rek" type="text" class="form-control" name="rek" value="{{ old('rek') }}">
                                @if ($errors->has('rek'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rek') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Bukti Transfer</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="bukti">
                            </div>
                        </div> 

                        @if(Auth::user()->level == 'admin')
                         <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            
                            <select class="form-control" name="status" required="">
                            
                                <option value="status">Belum</option>
                                <option value="status">Lunas</option>
                                
                            </select>
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Acara</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acaras as $data)
                                <tr class="pilih" data-acara_id="<?php echo $data->id; ?>" data-acara_judul="<?php echo $data->nama_acr; ?>" >
                                    <td>@if($data->cover)
                            <img src="{{url('images/acara/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/acara/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          {{$data->nama_acr}}</td>
                                    <td>{{$data->tgl_acara}}</td>
                                    <td>{{$data->ket}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            No Jemaat
                          </th>
                          <th>
                            Jenis Kelamin
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($jemaats as $data)
                                <tr class="pilih_jemaat" data-jemaat_id="<?php echo $data->id; ?>" data-jemaat_nama="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                          @if($data->user->gambar)
                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif

                            {{$data->nama}}
                          </td>
                          <td>
                            {{$data->nid}}
                          </td>

                        
                          <td>
                            {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection