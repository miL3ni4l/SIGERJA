@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Anggota</h4>
                      
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Anggota</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gerwil') ? ' has-error' : '' }}">
                            <label for="gerwil" class="col-md-4 control-label">Gerakan Wilayah</label>
                            <div class="col-md-6">
                            
                            <select class="form-control" name="gerwil" required="">
                                <option value="Tengah">Tengah</option>
                                <option value="Timur">Timur</option>
                                <option value="Barat">Barat</option>
                                <option value="Selatan">Selatan</option>
                                <option value="Utara">Utara</option>
                                
                            </select>
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                            <label for="sts_anggota" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="sts_anggota" required="">
                                <option value="Jemaat">Jemaat</option>
                                <option value="Simpatisan">Simpatisan</option>
                                <option value="Tamu">Tamu</option>
                            </select>
                            </div>
                        </div>
                       

                      
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Ubah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection