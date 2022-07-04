@extends('master')
@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">



                <div id="accordion">
                    <div class="card">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Rekap Hafalan</h4>
                            <button class="btn btn-primary " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Filter Data
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <form action="{{ route('laporan.index') }}">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="form-check-label">Tanggal Mulai</label>
                                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="@if(isset($_GET['tanggal_mulai'])){{$_GET['tanggal_mulai'] }}@endif">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="form-check-label">
                                                    Tanggal Selesai
                                                </label>
                                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="@if(isset($_GET['tanggal_selesai'])){{$_GET['tanggal_selesai'] }}@endif">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-check-label">
                                                    Kelas
                                                </label>
                                                <select name="kelas" class="form-control">
                                                    <option value="">Pilih Kelas</option>
                                                    @forelse($kelas as $item)
                                                    <option value="{{$item->id}}" @if(isset($_GET['kelas']) && $_GET['kelas']==$item->id) selected @endif>{{$item->kelas_nama}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-check-label">
                                                    Kategori
                                                </label>
                                                <select name="kategori" class="form-control">
                                                    <option value="">-Pilih Kategori-</option>
                                                    <option value="Setoran" @if(isset($_GET['kategori']) && $_GET['kategori']=='Setoran' ) selected @endif>Setoran</option>
                                                    <option value="Mengulang" @if(isset($_GET['kategori']) && $_GET['kategori']=='Mengulang' ) selected @endif>Mengulang</option>
                                                    <option value="Murojaah" @if(isset($_GET['kategori']) && $_GET['kategori']=='Murojaah' ) selected @endif>Murojaah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-info mt-4">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-3">
                    @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Peringtan</strong> {{ $error }}
                    </div>
                    @endforeach
                    @endif
                    <table class="table table-bordered" id="laporan-hafalan">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Program
                                </th>
                                <th>
                                    Tgl Daftar
                                </th>
                                <th>
                                    Tgl Lulus
                                </th>
                                <th width="100px">
                                    Total Poin
                                </th>
                                <th width="100px">
                                    Presentse
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hafalan as $key => $item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>@php
                                    echo '<span class="badge badge-info" style="width:150px">'.$item->program_nama.'</span>';
                                    @endphp
                                </td>
                                <td>{{ date('d/m/Y',strtotime($item->tanggal_daftar)) }}</td>
                                <td>
                                @php
                                    if($item->program_satuan == 'Y'){
                                        $satuan = 'years';
                                    }elseif($item->program_satuan == 'M'){
                                        $satuan = 'month';
                                    }else{
                                        $satuan = 'days';
                                    }
                                  echo date('d/m/Y',strtotime($item->tanggal_daftar." + ".$item->program_durasi." ".$satuan));
                                @endphp
                                </td>
                                <td>{{ $item->totalPoin }} / 100</td>
                                <td>@php
                                    $persen = ($item->totalPoin / 100)*100;
                                    echo number_format($persen,2,",",".").' %'; 
                                    @endphp
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$persen}}%" aria-valuenow="{{$persen}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>

                            </tr>
                            @empty
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let documentTitle = $('.card-title').text();
        $('#laporan-hafalan').dataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle,
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle,
                    //orientation: 'landscape',
                    pageSize: 'LEGAL',

                }
            ]
        });
    });
</script>
@endsection