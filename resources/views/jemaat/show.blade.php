@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->nama}}</b></h4>
                      <form class="forms-sample">
                    

                        <div class="form-group{{ $errors->has('kode_jemaat') ? ' has-error' : '' }}">
                            <label for="kode_jemaat" class="col-md-4 control-label">Nomor Induk Jemaat</label>
                            <div class="col-md-6">
                                <input id="kode_jemaat" type="text" class="form-control" name="kode_jemaat" value="{{ $data->kode_jemaat }}" readonly>
                                @if ($errors->has('kode_jemaat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_jemaat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sts_jemaat') ? ' has-error' : '' }}">
                            <label for="sts_jemaat" class="col-md-4 control-label">Status Anggota</label>
                            <div class="col-md-6">
                                <input id="sts_jemaat" type="text" class="form-control" name="sts_jemaat" value="{{ $data->sts_jemaat }}" readonly>
                                @if ($errors->has('sts_jemaat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sts_jemaat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Jemaat</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" readonly>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label> 
                            <div class="col-md-6">
                                <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir}}" readonly>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('goldar') ? ' has-error' : '' }}">
                            <label for="goldar" class="col-md-4 control-label">Golongan Darah</label> 
                            <div class="col-md-6">
                                <input id="goldar" type="text" class="form-control" name="goldar" value="{{ $data->goldar}}" readonly>
                                @if ($errors->has('goldar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('goldar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label> 
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat}}" readonly>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        
                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label for="hp" class="col-md-4 control-label">No HP</label> 
                            <div class="col-md-6">
                                <input id="hp" type="text" class="form-control" name="hp" value="{{ $data->hp}}" readonly>
                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                      
                        <a href="{{route('jemaat.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection