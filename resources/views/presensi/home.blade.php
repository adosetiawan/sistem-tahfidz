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
                    <table class="table table-bordered">
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
                            @forelse ($presensi as $item)
                            <tr>
                                <td>1</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kehadiran }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>

                                    <form action="{{ route('santri.destroy', $item->id) }}" method="POST" <br>
                                        <a class="btn btn-warning" href="{{ route('santri.edit', $item->id) }}">edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">delete</a>

                                    </form>

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
@endsection

