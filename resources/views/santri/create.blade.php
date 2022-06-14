@extends('master')
@section('konten')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Santri</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample">
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputName1">Nama lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputEmail3">Alamat Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputPassword4">Nomor Telepon</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleSelectGender">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleSelectGender">
                                <option value="perempuan">Perempuan</option>
                                <option value="laki-laki">Laki-laki</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputCity1">Tanggal lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggalLahir" placeholder="tanggal lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputCity1">Tempat lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleTextarea1">Alamat Lengakap</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Foto Profil</label>
                        <div class="col-sm-9">
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
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