@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

&nbsp; &nbsp;
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Halaman
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{ route('jemaat.index') }}">Jemaat</a></li>
    <li><a href="{{ route('gerwil.index') }}"> Gerakan Wilayah</a></li>
    <li><a href="{{ route('jabatan.index') }}"> Jabatan</a></li>
    <li><a href="{{ route('talenta.index') }}"> Talenta</a></li>
  </ul>
</div>
&nbsp; &nbsp; &nbsp;

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tambah Gerakan Wilayah
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{ route('jemaat.create') }}">Tambah Jemaat</a></li>
    <li><a href="{{ route('gerwil.create') }}"> Tambah Gerakan Wilayah</a></li>
    <li><a href="{{ route('jabatan.create') }}">Tambah Jabatan</a></li>
    <li><a href="{{ route('talenta.create') }}">Tambah Talenta</a></li>
  </ul>
</div>

    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Gerakan Wilayah</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Gerakan Wilayah
                          </th>
                           <th>
                            Keterangan
                          </th>
                         
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          
                          <td>
                            {{$data->nama_gerwil}}
                          </td>

                          <td>
                            {{$data->ket}}
                          </td>

                          <td>
                           <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('jabatan.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('jabatan.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection