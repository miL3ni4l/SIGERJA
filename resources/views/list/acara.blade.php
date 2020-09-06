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
<div class="row"  style="margin-top: 20px;">
<div class="col-md-12 col-sm-6 col-xs-12">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-microphone-variant text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Acara</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$acara->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Total seluruh acara
                  </p>
                </div>
              </div>
            </div> 
</div>
<div class="row" style="margin-top: 20px;">

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data acara</h4>
             
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          
                          <th>
                            Acara
                          </th>
                          <th>
                            Tanggal
                          </th>
                          <th>
                            Lokasi
                          </th>
                          <th>
                            Anggaran
                          </th>
                          <th>
                            Dibuat Tanggal
                          </th>
                          
                         
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          @if($data->cover)
                            <img src="{{url('images/acara/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/acara/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          <a> 
                            {{$data->nama_acr}}
                          </a>
                          </td>

                          <td>
                            {{$data->tgl_acara}}
                          </td>
                          <td>
                            {{$data->lokasi}}
                          </td>
                          <td>
                            {{$data->jumlah_acara}}
                          </td>
                          <td>
                            {{$data->created_at}}
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