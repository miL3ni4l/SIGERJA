
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

@if(Auth::user()->level == 'admin')
   
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Kepala Keluarga</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$transnikah->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh donasi
                  </p>
                </div>
              </div>
            </div>
        
        
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">anggota</p>
                      <div class="fluid-container">
                       <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Jemaat')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Simpatisan</p>
                      <div class="fluid-container">
                       <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Simpatisan')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>
           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tamu</p>
                      <div class="fluid-container">
                       <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Tamu')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>

           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-gender-male text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Pria</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('jk', 'Pria')->count()}}</h3> 
                      </div> 
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> anggota pria
                  </p>
                </div>
              </div>
            </div>

             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-gender-female text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Wanita</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('jk', 'Wanita')->count()}}</h3>
                      </div> 
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> anggota Wanita
                  </p>
                </div>
              </div>
            </div>

</div>




















@else   
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">anggota</p>
                      <div class="fluid-container">
                       <h3 class="counter text-right m-t-15 text-danger">{{$anggotas}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-currency-usd text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Kas Gereja</p>
                      <div class="fluid-container">
                      
                       <h3 class="font-weight-medium text-danger mb-0">{{$transaksis}}</h3> 
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh pendapatan
                  </p>
                </div>
              </div>
            </div>
          
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-microphone-variant text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Acara</p>
                      <div class="fluid-container">
                        <h3 class="counter text-right m-t-15 text-danger">{{$acaras}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh acara
                  </p>
                </div>
              </div>
            </div>
            
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-currency-usd text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Donasi Anda</p>
                      <div class="fluid-container">
                      
                       <h3 class="font-weight-medium text-danger mb-0">{{$transaksis}}</h3> 
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh pendapatan
                  </p>
                </div>
              </div>
            </div>

          
      
</div>


<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Transaksi</h4>
                  
                  
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Kode
                          </th>
                          <th>
                            Acara
                          </th>
                          
                          <th>
                            Tanggal Donasi
                          </th>
                          <th>
                            Jumlah Donasi
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Ket
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          <a href="{{route('transaksi.show', $data->id)}}"> 
                            {{$data->kode_transaksi}}
                          </a>
                          </td>
                         
                          <td>
                            {{$data->acara->nama_acr}}
                          </td>
                         
                         
              
                         <td>
                            {{date('d/m/y', strtotime($data->tgl_transaksi))}}
                          </td>

                          <td>
                            {{$data->total_donasi}}
                          </td>
              

                          <td>
                          @if($data->status == 'belum')
                            <label class="badge badge-warning">belum</label>
                          @else
                            <label class="badge badge-success">lunas</label>
                          @endif
                          </td>

                           <td>
                            {{$data->ket}}
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
@endif
@endsection
