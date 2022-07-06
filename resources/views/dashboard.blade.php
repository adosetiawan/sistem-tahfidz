@extends('master')
@section('konten')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Selamat datang {{$nama}}</h3>
        <h6 class="font-weight-normal mb-0">SITAQU Sistem Tahfidzul Quran </h6>
      </div>
      <div class="col-12 col-xl-4">
        <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="mdi mdi-calendar"></i> Today ({{date('d/m/Y')}})
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
              <a class="dropdown-item" href="#">January - March</a>
              <a class="dropdown-item" href="#">March - June</a>
              <a class="dropdown-item" href="#">June - August</a>
              <a class="dropdown-item" href="#">August - November</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p class="card-title">Grafik hafalan perkaca halaman, bulanan</p>
          <a href="#" class="text-info">View all</a>
        </div>
        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
        <canvas id="sales-chart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Santri Putra</p>
            <p class="fs-30 mb-2">{{$santri['putra']->total}}</p>
            <p>Orang</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Santri Putri</p>
            <p class="fs-30 mb-2">{{$santri['putri']->total}}</p>
            <p>Orang</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body">
            <p class="mb-4">Pengajar Putra</p>
            <p class="fs-30 mb-2">{{$pengajar['putra']->total}}</p>
            <p>Orang</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Pengajar Putri</p>
            <p class="fs-30 mb-2">{{$pengajar['putri']->total}}</p>
            <p>Orang</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
      <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
        <div class="card data-icon-card-primary">
          <div class="card-body">
            <p class="card-title text-white">Total Santri keseluruhan</p>
            <div class="row">
              <div class="col-8 text-white">
                <h3>{{$santri['putraputri']->total}}</h3>
                <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
              </div>
              <div class="col-4 background-icon">
              </div>
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