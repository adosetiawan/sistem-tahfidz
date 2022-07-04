@extends('master')
@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data pengajar</h4>
                   <div>
                    <a href="{{ route('pengajar.create') }}" class="btn btn-primary">Tambah pengajar</a>
                   </div>
                </div>
                <div class=" pt-3">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                    <table class="table table-striped" id="table-pengajar">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->alamat_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('pengajar.edit', $item->id) }}">edit</a>
                                    <a class="btn btn-danger" href="{{ url('pengajar/delete', $item->id) }}">delete</a>
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
    $(document).ready(function(){
        let documentTitle = $('.card-title').text();
        $('#table-pengajar').dataTable({
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
                    //orientation: 'landscape',
                    pageSize: 'LEGAL',
               
                }
            ]
    } );
    });
</script>
@endsection