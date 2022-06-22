@extends('master')
@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data Kelas</h4>
                    <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>
                                    Kode
                                </th>
                                <th>
                                    Nama Kelas
                                </th>
                                <th>
                                    Tingkat
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>1</td>
                                <td>{{ $item->kelas_kode }}</td>
                                <td>{{ $item->kelas_nama }}</td>
                                <td>{{ $item->kelas_tingkat }}</td>
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