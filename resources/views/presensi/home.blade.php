@extends('master')
@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data Absen</h4>
                    <a href="{{ route('presensi.create') }}" class="btn btn-primary">Tambah Absen</a>
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
                                <td>{{ $item->kehadiran }}</td>
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
    $(document).ready(function(){
        let documentTitle = $('.card-title').text();
        $('#table-presensi').dataTable({
        dom: 'Bfrtip',
        buttons: [
                {
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
    } );
    });
</script>
@endsection

