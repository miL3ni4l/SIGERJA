@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

 $(document).on('click', '.pilih', function (e) {
                document.getElementById("bank_judul").value = $(this).attr('data-bank_judul');
                document.getElementById("bank_id").value = $(this).attr('data-bank_id');
                $('#myModal').modal('hide');
            });


            $(function () { 
                $("#lookup, #lookup2").dataTable();
            });

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('acara.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Acara Baru</h4>
                      
                        <div class="form-group{{ $errors->has('nama_acr') ? ' has-error' : '' }}">
                            <label for="nama_acr" class="col-md-4 control-label">Acara</label>
                            <div class="col-md-6">
                                <input id="nama_acr" type="text" class="form-control" name="nama_acr" value="{{ old('nama_acr') }}" required>
                                @if ($errors->has('nama_acr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_acr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('tgl_acara') ? ' has-error' : '' }}">
                            <label for="tgl_acara" class="col-md-4 control-label">Tanggal Pelaksanaan</label>
                            <div class="col-md-6">
                                <input id="tgl_acara" type="date" class="form-control" name="tgl_acara" value="{{ old('tgl_acara') }}" required>
                                @if ($errors->has('tgl_acara'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_acara') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi" class="col-md-4 control-label">Lokasi Acara</label>
                            <div class="col-md-6">
                                <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}" required>
                                @if ($errors->has('lokasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                
                        <div class="form-group{{ $errors->has('jumlah_acara') ? ' has-error' : '' }}">
                            <label for="jumlah_acara" class="col-md-4 control-label">Rencana Anggaran</label>
                            <div class="col-md-6">
                                <input id="jumlah_acara" type="number" maxlength="4" class="form-control" name="jumlah_acara" value="{{ old('jumlah_acara') }}" required>
                                @if ($errors->has('jumlah_acara'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_acara') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                            <label for="bank_id" class="col-md-4 control-label">Rekening Tujuan</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="bank_judul" type="text" class="form-control" readonly="" required> 
                                <input id="bank_id" type="hidden" name="bank_id" value="{{ old('bank_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('bank_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_id') }}</strong>
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
                        
                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}" >
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
                        <a href="{{route('acara.index')}}" class="btn btn-light pull-right">Back</a>
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
                                    <th>Atas Nama</th>
                                    <th>BANK</th>
                                     <th>No Rekening</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bank as $data)
                                <tr class="pilih" data-bank_id="<?php echo $data->id; ?>" data-bank_judul="<?php echo $data->nama; ?>" >
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->bank}}</td>
                                    <td>{{$data->rek}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

@endsection