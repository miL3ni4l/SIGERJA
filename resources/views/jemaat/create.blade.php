@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("gerwil_judul").value = $(this).attr('data-gerwil_judul');
                document.getElementById("gerwil_id").value = $(this).attr('data-gerwil_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_jabatan', function (e) {
                document.getElementById("jabatan_judul").value = $(this).attr('data-jabatan_judul');
                document.getElementById("jabatan_id").value = $(this).attr('data-jabatan_id');
                $('#myModal2').modal('hide');
            });

            $(document).on('click', '.pilih_talenta', function (e) {
                document.getElementById("talenta_judul").value = $(this).attr('data-talenta_judul');
                document.getElementById("talenta_id").value = $(this).attr('data-talenta_id');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilih_ibu', function (e) {
                document.getElementById("ibu_judul").value = $(this).attr('data-ibu_judul');
                document.getElementById("sts_keluarga").value = $(this).attr('data-ibu_id');
                $('#myModal4').modal('hide');
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

<form method="POST" action="{{ route('jemaat.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h2 class="card-title">Formulir Tambah Anggota Baru</h2>
                      

                        <div class="form-group{{ $errors->has('kode_jemaat') ? ' has-error' : '' }}">
                            <label for="kode_jemaat" class="col-md-6 control-label">Kode Jemaat</label>
                            <div class="col-md-7">
                                <input id="kode_jemaat" type="text" class="form-control" name="kode_jemaat" value="{{ $kode }}" required readonly="">
                                @if ($errors->has('kode_jemaat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_jemaat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('sts_jemaat') ? ' has-error' : '' }}">
                            <label for="sts_jemaat" class="col-md-4 control-label">Status Anggota</label>
                            <div class="col-md-7">
                            <select class="form-control" name="sts_jemaat" required="">
                                <option value="Jemaat">Jemaat</option>
                                <option value="Simpatisan">Simpatisan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-7">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                            <div class="col-md-7">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-7">
                                <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                              <label for="jk" class="col-md-2 control-label">Jenis Kelamin  </label>
                              
                                <label>
                                    <input type="radio" name="jk" value="Pria">
                                    Pria
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="jk" value="Wanita">
                                Wanita
                                </label>
                        </div>


                        <div class="form-group{{ $errors->has('goldar') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-2 control-label">Golonngan Darah    </label>
                              
                                <label>
                                    <input type="radio" name="goldar" value="A">
                                    A
                                </label>   &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="B">
                                    B
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="AB">
                                    AB
                                </label>  &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="O">
                                    O
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="RH+">
                                    RH+
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="RH-">
                                    RH-
                                </label>
                        </div>

                        <div class="form-group{{ $errors->has('sts_klrg') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-2 control-label">Status Keluarga    </label>
                              
                                <label>
                                    <input type="radio" name="sts_klrg" value="Suami">
                                    Suami
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_klrg" value="Istri">
                                    Istri
                                </label>   &nbsp; &nbsp; 
                                <label> 
                                <input type="radio" name="sts_klrg" value="Anak">
                                    Anak
                                </label>  &nbsp;&nbsp;
                                <label>
                                <input type="radio" name="sts_klrg" value="Lainnya">
                                    Lainnya
                                </label>
                        </div>

                          <div class="form-group{{ $errors->has('pernikahan') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-2 control-label">Status </label>
                              
                                <label>
                                    <input type="radio" name="pernikahan" value="Belum Menikah">
                                    Belum Menikah
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pernikahan" value="Menikah">
                                    Menikah
                                </label>  &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pernikahan" value="Janda">
                                    Janda
                                </label>   &nbsp; &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pernikahan" value="Duda">
                                    Duda
                                </label>
                        </div>
                         

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-7">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kota') ? ' has-error' : '' }}">
                            <label for="kota" class="col-md-4 control-label">Kota</label>
                            <div class="col-md-7">
                                <input id="kota" type="text" class="form-control" name="kota" value="{{ old('kota') }}" required>
                                @if ($errors->has('kota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                            <label for="kelurahan" class="col-md-4 control-label">Kelurahan</label>
                            <div class="col-md-7">
                                <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="{{ old('kelurahan') }}" required>
                                @if ($errors->has('kelurahan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelurahan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('gerwil') ? ' has-error' : '' }}">
                              <label for="gerwil" class="col-md-2 control-label">Gereja Wilayah    :</label>
                              
                                <label>
                                    <input type="radio" name="gerwil" value="Tengah">
                                    Tengah
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Timur">
                                    Timur
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Barat">
                                    Barat
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Selatan">
                                    Selatan
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="gerwil" value="Utara">
                                    Utara
                                </label>
                        </div>

                      

                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama Sebelumnya</label>
                            <div class="col-md-7">
                            <select class="form-control" name="agama" required="">
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Budha</option>
                                <option value="KhongHuCu">Khong Hu Cu</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                              <label for="pendidikan" class="col-md-2 control-label">Pendidikan    </label>
                              
                                <label>
                                    <input type="radio" name="pendidikan" value="SD">
                                    SD
                                </label> &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="SLTP">
                                    SLTP
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="SLTA">
                                    SLTA
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="D1">
                                    D1
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="D2">
                                    D2
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="D3">
                                    D3
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="S1">
                                    S1
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="S2">
                                    S2
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="pendidikan" value="S3">
                                    S3
                                </label>
                        </div>

                        <div class="form-group{{ $errors->has('ilmu') ? ' has-error' : '' }}">
                              <label for="ilmu" class="col-md-2 control-label">Bidang Ilmu    </label>
                              
                                <label>
                                    <input type="radio" name="ilmu" value="SD">
                                    Teknik
                                </label> &nbsp; &nbsp;
                                <label>
                                <input type="radio" name="ilmu" value="SLTP">
                                    Hukum
                                </label>&nbsp; &nbsp;
                                <label>
                                <input type="radio" name="ilmu" value="SLTA">
                                    Dokter
                                </label>&nbsp; &nbsp;
                               
                        </div>

                      
                        
                        <div class="form-group{{ $errors->has('sts_keluarga') ? ' has-error' : '' }}">
                            <label for="sts_keluarga" class="col-md-4 control-label">Silsilah Keluarga (Jika tidak ada isi - )</label>
                            <div class="col-md-7">
                                <div class="input-group" >
                                <input id="ibu_judul" type="text" class="form-control "  >
                                <input id="sts_keluarga" type="hidden" name="sts_keluarga" value="{{ old('sts_keluarga') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal4"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('sts_keluarga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sts_keluarga') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>

              

            

                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-4 control-label">Pekerjaan</label>
                            <div class="col-md-7">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                @if ($errors->has('pekerjaan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label for="hp" class="col-md-4 control-label">No HP</label>
                            <div class="col-md-7">
                                <input id="hp" type="number" maxlength="4" class="form-control" name="hp" value="{{ old('hp') }}" required>
                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nij') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                      

                        

                        
                        <button type="submit" class="btn btn-primary col-md-5" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger col-md-2">
                                    Reset
                        </button>
                        <a href="{{route('jemaat.index')}}" class="btn btn-light pull-right">Back</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Cari Gerakan Wilayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Gerakan Wilayah</th>
                                     <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gerwils as $data)
                                <tr class="pilih" data-gerwil_id="<?php echo $data->id; ?>" data-gerwil_judul="<?php echo $data->nama_gerwil; ?>" >
                                    <td>{{$data->nama_gerwil}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Jabatan</th>
                                     <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jabatans as $data)
                        <tr class="pilih_jabatan" data-jabatan_id="<?php echo $data->id; ?>" data-jabatan_judul="<?php echo $data->nama_jabatan; ?>" >
                                    <td>{{$data->nama_jabatan}}</td>
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
<div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Talenta</th>
                                     <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($talentas as $data)
                        <tr class="pilih_talenta" data-talenta_id="<?php echo $data->id; ?>" data-talenta_judul="<?php echo $data->nama_talenta; ?>" >
                                    <td>{{$data->nama_talenta}}</td>
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
<div class="modal fade bd-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                     <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jemaats as $data)
                        <tr class="pilih_ibu" data-ibu_id="<?php echo $data->id; ?>" data-ibu_judul="<?php echo $data->nama; ?>" >
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->sts_jemaat}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection