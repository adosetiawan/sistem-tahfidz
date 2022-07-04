@extends('master')
@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <div id="accordion">
                    <div class="card">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data Absen</h4>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Filter Data
                    </button>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form action="{{ url('laporan/absensipengajar') }}">
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
                                            Kategori
                                        </label>
                                        <select name="status" class="form-control">
                                            <option value="">-Pilih Status-</option>
                                            <option value="Hadir" @if(isset($_GET['status']) && $_GET['status']=='Hadir' ) selected @endif>Hadir</option>
                                            <option value="Alpha" @if(isset($_GET['status']) && $_GET['status']=='Alpha' ) selected @endif>Alpha</option>
                                            <option value="Izin" @if(isset($_GET['status']) && $_GET['status']=='Izin' ) selected @endif>Izin</option>
                                            <option value="Sakit" @if(isset($_GET['status']) && $_GET['status']=='Sakit' ) selected @endif>Sakit</option>
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
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="table-presensi">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Tanggal
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presensi as $key => $item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $item->nama }}</td>
                                <td>@php
                                    if($item->kehadiran == 'Alpha'){
                                    echo '<span class="badge badge-danger" style="width:100px">'.$item->kehadiran.'</span>';
                                    }elseif($item->kehadiran == 'Hadir'){
                                    echo '<span class="badge badge-info" style="width:100px">'.$item->kehadiran.'</span>';
                                    }else{
                                    echo '<span class="badge badge-warning" style="width:100px">'.$item->kehadiran.'</span>';
                                    }
                                    @endphp
                                </td>
                                <td>{{ $item->tanggal }}</td>

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
        $('#table-presensi').dataTable({
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
                    orientation: 'landscape',
                    pageSize: 'LEGAL',

                }
            ]
        });
    });
</script>
@endsection