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

                        <div class="col-lg-2">
                        <a href="{{ route('jemaat.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Jemaat</a>
                        </div>
                        </br> </br>
   			                
                         <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Jemaat</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/jmt/pdf')}}"> Semua  </a>
                            <a class="dropdown-item" href="{{url('laporan/jmt/pdf?sts_jemaat=jemaat')}}"> Jemaat </a>
                            <a class="dropdown-item" href="{{url('laporan/jmt/pdf?sts_jemaat=simpatisan')}}"> Simpatisan </a>
                            <a class="dropdown-item" href="{{url('laporan/jmt/pdf?sts_jemaat=tamu')}}"> Tamu </a>
                          </div>
                        </div>
                       &nbsp; &nbsp; &nbsp;
                       <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Gerwil</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf')}}"> Semua  </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=tengah')}}"> Tengah </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=timur')}}"> Timur </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=barat')}}"> Barat </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=selatan')}}"> Selatan </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Utara')}}"> Utara </a>
                          </div>
                        </div>
                       
                  <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">


            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jemaat</p>
                      <div class="fluid-container">
                      <h3 class="font-weight-medium text-danger mb-0">{{$jemaat->where('sts_jemaat', 'Jemaat')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh Jemaat
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Simpatisan</p>
                      <div class="fluid-container">
                      <h3 class="font-weight-medium text-danger mb-0">{{$jemaat->where('sts_jemaat', 'Simpatisan')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh Jemaat
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tamu</p>
                      <div class="fluid-container">
                      <h3 class="font-weight-medium text-danger mb-0">{{$jemaat->where('sts_jemaat', 'Tamu')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh Jemaat
                  </p>
                </div>
              </div>
            </div>


<div class="col-lg-12 grid-margin stretch-card"  style="margin-top: 20px;">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Jemaat</h4>

                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                        <th>
                            No Jemaat
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            JK
                          </th>
                         
                         
                          <th>
                            Gerwil
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
                          <a href="{{route('jemaat.show', $data->id)}}"> 
                            {{$data->kode_jemaat}}
                          </a>
                          </td>
                          <td class="py-1">
                         
                            {{$data->nama}}
                          </td>

                          <td>
                            {{$data->jk}}
                          </td>
     
                          <td>
                            {{$data->gerwil}}
                          </td>

                          <td>
                            {{$data->sts_jemaat}}
                          </td>
                          

                          <td>
                           <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('jemaat.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('jemaat.destroy', $data->id) }}" class="pull-left"  method="post">
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