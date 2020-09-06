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

</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Laporan Gerakan Wilayah</h4>
                  <div class="btn-group dropdown">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                               <a class="dropdown-item" href="{{url('laporan/jmt/pdf')}}"> Semua  </a>
                            <a class="dropdown-item" href="{{url('laporan/jmt/pdf?sts_gerwil=gerwil')}}"> Gerwil </a>
                            <a class="dropdown-item" href="{{url('laporan/jmt/pdf?sts_gerwil=simpatisan')}}"> Simpatisan </a>
                          </div>
                        </div>
                        
                </div>
              </div>
            </div>
          </div>
@endsection