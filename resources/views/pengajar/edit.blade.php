@extends('master')

@section('konten')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah pengajar</h4>

                <form class="forms-sample" action="{{ route('pengajar.update',$items->id) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') ?? $items->nama }}" id="nama" placeholder="Masukan Nama">
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
                            <select name="jenis_kelamin" class="form-control" id="jenis-kelamin">
                                <option value="laki-laki"  @if($items->jenis_kelamin == 'laki-laki')selected @endif>Laki-laki</option>
                                <option value="perempuan" @if($items->jenis_kelamin == 'perempuan')selected @endif>Perempuan</option>
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
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') ?? $items->tanggal_lahir }}" id="tanggal_lahir" placeholder="Masukan tanggal lahir">
                        </div>
                        <div class="col-sm-5">
                            @error('tempat_lahir')
                            <small class="alert alert-dabger">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Peringtan</strong> {{ $message }}
                                </div>
                            </small>
                            @enderror
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') ?? $items->tempat_lahir }}" id="tempat_lahir" placeholder="Masukan tempat lahir">
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
                            <textarea name="alamat_lengkap" class="form-control" cols="30" rows="10">{{ old('alamat_lengkap') ?? $items->alamat_lengkap }}</textarea>
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
                            <input type="text" name="level" class="form-control" value="{{ old('level') ?? $items->level }}" id="exampleInputEmail3" placeholder="level" value="pengajar" readonly>
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