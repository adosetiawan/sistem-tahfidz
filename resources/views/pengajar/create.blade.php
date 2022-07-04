@extends('master')

@section('konten')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah pengajar</h4>

                <form class="forms-sample" action="{{route('pengajar.store')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3" for="nama">Nama</label>
                        <div class="col-sm-9">
                            @error('nama')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="jenis-kelamin">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            @error('jenis_kelamin')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <select  name="jenis_kelamin" class="form-control" id="jenis-kelamin">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="tanggal_lahir">Tempat/Tanggal Lahir</label>
                        <div class="col-sm-4">
                            @error('tanggal_lahir')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Masukan tanggal lahir">
                        </div>
                        <div class="col-sm-5">
                            @error('tempat_lahir')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan tempat lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="alamat-lengkap">Alamat Lengkap</label>
                        <div class="col-sm-9">
                            @error('alamat_lengkap')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <textarea  name="alamat_lengkap" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputName1">Email</label>
                        <div class="col-sm-9">
                            @error('email')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="text" name="email" class="form-control" id="exampleInputName1" placeholder="Masukan Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputEmail3">Level</label>
                        <div class="col-sm-9">
                            @error('level')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="text" name="level" class="form-control" id="exampleInputEmail3" placeholder="level" value="pengajar" readonly>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-3" for="username">Username</label>
                        <div class="col-sm-9">
                            @error('username')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="password">Password</label>
                        <div class="col-sm-9">
                            @error('password')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button class="btn btn-light">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection