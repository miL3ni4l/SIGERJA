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

 			                  <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Anggota</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf')}}"> Semua  </a>
                            
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf?sts_anggota=jemaat')}}"> Jemaat </a>
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf?sts_anggota=simpatisan')}}"> Simpatisan </a>
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf?sts_anggota=tamu')}}"> Tamu </a>
                          </div>
                        </div>
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
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
            
</div>
@endsection