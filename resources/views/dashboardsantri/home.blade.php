@extends('master')
@section('konten')

<div class="row">
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-0">Absensi</p>
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th class="pl-0  pb-2 border-bottom">Santri</th>
                <th class="border-bottom pb-2">Status</th>
                <th class="border-bottom pb-2">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($absensi as $key => $item)
              <tr>
                <td class="pl-0">{{$item->nama_lengkap}}</td>
                <td>
                  @php
                  if($item->kehadiran == 'Hadir'){
                  echo '<span class="badge badge-success" style="width:60px">'.$item->kehadiran.'</span>';
                  }elseif($item->kehadiran == 'Izin'){
                  echo '<span class="badge badge-warning" style="width:60px">'.$item->kehadiran.'</span>';
                  }else{
                  echo '<span class="badge badge-danger" style="width:60px">'.$item->kehadiran.'</span>';
                  }
                  @endphp
                </td>
                <td class="text-muted">{{ date('d/m/Y',strtotime($item->tanggal)) }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-0">Setoran</p>
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th class="pl-0  pb-2 border-bottom">Santri</th>
                <th class="border-bottom pb-2">Kategori</th>
                <th class="border-bottom pb-2">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($absensi as $key => $item)
              <tr>
                <td class="pl-0">{{$item->nama_lengkap}}</td>
                <td>
                  @php
                  if($item->kategori == 'Setoran'){
                  echo '<span class="badge badge-success" style="width:60px">'.$item->kategori.'</span>';
                  }elseif($item->kategori == 'Mengulang'){
                  echo '<span class="badge badge-warning" style="width:60px">'.$item->kategori.'</span>';
                  }else{
                  echo '<span class="badge badge-danger" style="width:60px">'.$item->kategori.'</span>';
                  }
                  @endphp
                </td>
                <td class="text-muted">{{ date('d/m/Y',strtotime($item->tanggal)) }}</td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="row">
    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
        <div class="card data-icon-card-primary">
          <div class="card-body">
            <p class="card-title text-white">Informasi Program </p>
            <div class="row">
              <div class="col-8 text-white">
              <h3>s</h3>
                <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
              </div>
              <div class="col-4 background-icon">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Target Hafalan</p>
            <div class="charts-data">
              @forelse ($hafalan as $key => $item)
              @php
              $persen = ($item->totalPoin / 100)*100;
              @endphp
              <div class="mt-3">
                <p class="mb-0">{{$item->nama_lengkap}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="progress progress-md flex-grow-1 mr-4">
                    <div class="progress-bar bg-inf0" role="progressbar" style="width: {{$persen}}%" aria-valuenow="{{$persen}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mb-0">{{number_format($persen,2,",",".").' %';}}</p>
                </div>
              </div>
              @empty
              @endforelse
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
</div>
<script>
</script>
@endsection