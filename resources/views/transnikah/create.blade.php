@section('js')
 <script type="text/javascript">
 
            $(document).on('click', '.pilih_suami', function (e) {
                document.getElementById("suami_judul").value = $(this).attr('data-suami_judul');
                document.getElementById("jemaat_id").value = $(this).attr('data-jemaat_id');
                $('#myModal2').modal('hide');
            }); 

            $(document).on('click', '.pilih_istri', function (e) {
                document.getElementById("istri_judul").value = $(this).attr('data-istri_judul');
                document.getElementById("istri_id").value = $(this).attr('data-istri_id');
                $('#myModal3').modal('hide');
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
                      <h4 class="card-title">Tambah Data Pencatatan Nikah</h4>
                    
                         <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
                            <label for="kode" class="col-md-4 control-label">No Pernikahan</label>
                            <div class="col-md-6">
                                <input id="kode" type="text" class="form-control" name="kode" value="{{ old('kode') }}" required>
                                @if ($errors->has('kode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('tgl') ? ' has-error' : '' }}">
                            <label for="tgl" class="col-md-4 control-label">Tanggal Pernikahan</label>
                            <div class="col-md-6">
                                <input id="tgl" type="date" class="form-control" name="tgl" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('jemaat_id') ? ' has-error' : '' }}">
                            <label for="jemaat_id" class="col-md-4 control-label">Nama Suami</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="suami_judul" type="text" class="form-control" readonly="" required>
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
                        
                          <div class="form-group{{ $errors->has('istri_id') ? ' has-error' : '' }}">
                            <label for="istri_id" class="col-md-4 control-label">Nama Istri</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="istri_judul" type="text" class="form-control" readonly="" required>
                                <input id="istri_id" type="hidden" name="istri_id" value="{{ old('istri_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('istri_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('istri_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('pdt') ? ' has-error' : '' }}">
                            <label for="pdt" class="col-md-4 control-label">Pendeta</label>
                            <div class="col-md-6">
                                <input id="pdt" type="text" class="form-control" name="pdt" value="{{ old('pdt') }}">
                                @if ($errors->has('pdt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pdt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                      
                        <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                            <label for="tempat" class="col-md-4 control-label">Tempat Pelaksanaan</label>
                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control" name="tempat" value="{{ old('tempat') }}">
                                @if ($errors->has('tempat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('jam') ? ' has-error' : '' }}">
                            <label for="jam" class="col-md-4 control-label">Jam</label>
                            <div class="col-md-6">
                                <input id="jam" type="text" class="form-control" name="jam" value="{{ old('jam') }}">
                                @if ($errors->has('jam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    

                        
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
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
                            Status Keanggotan
                          </th>
                          <th>
                            Jenis Kelamin
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($jemaats as $data)
                                <tr class="pilih_suami" data-jemaat_id="<?php echo $data->id; ?>" data-suami_judul="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                            {{$data->nama}}
                          </td>
                          <td>
                            {{$data->sts_jemaat}}
                          </td>
                          <td>
                           {{$data->jk === "Pria" ? "Pria" : "Wanita"}}
                          </td>
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
                            Status Keanggotaan
                          </th>
                          <th>
                            Jenis Kelamin
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($jemaats as $data)
                                <tr class="pilih_istri" data-istri_id="<?php echo $data->id; ?>" data-istri_judul="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                            {{$data->nama}}
                          </td>
                        <td>
                            {{$data->sts_jemaat}}
                          </td>
                          <td>
                            {{$data->jk === "Pria" ? "Pria" : "Wanita"}}
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