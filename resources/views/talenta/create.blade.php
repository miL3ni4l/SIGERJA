@section('js')

<script type="text/javascript">

            $(document).on('click', '.pilih_jemaat', function (e) {
                document.getElementById("jemaat_judul").value = $(this).attr('data-jemaat_judul');
                document.getElementById("jemaat_id").value = $(this).attr('data-jemaat_id');
                $('#myModal2').modal('hide');
            });

$(document).ready(function() {
    $(".users").select2();
});

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

<form method="POST" action="{{ route('talenta.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Talenta</h4>
                      
                        <div class="form-group{{ $errors->has('jemaat_id') ? ' has-error' : '' }}">
                            <label for="jemaat_id" class="col-md-4 control-label">Jemaat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="jemaat_judul" type="text" class="form-control"  required>
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

                       
                        <div class="form-group{{ $errors->has('nama_talenta') ? ' has-error' : '' }}">
                            <label for="nama_talenta" class="col-md-4 control-label">Talenta</label>
                            <div class="col-md-6">
                                <input id="nama_talenta" type="text" class="form-control" name="nama_talenta" value="{{ old('nama_talenta') }}" required>
                                @if ($errors->has('nama_talenta'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_talenta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}" required>
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
                        <a href="{{route('talenta.index')}}" class="btn btn-light pull-right">Back</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Cari jemaat</h5>
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
                        <tr class="pilih_jemaat" data-jemaat_id="<?php echo $data->id; ?>" data-jemaat_judul="<?php echo $data->nama; ?>" >
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