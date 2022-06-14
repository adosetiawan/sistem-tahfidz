@extends('master')
@section('konten')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                <h4 class="card-title">Data Santri</h4>
                <a href="{{ route('santri.create') }}"  class="btn btn-primary">Tambah Santri</a>
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
                                    Program
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Telepon
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>1</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->program_id }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
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