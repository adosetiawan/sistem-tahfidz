@extends('master')

@section('konten')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Kelas</h4>
                <form class="forms-sample" action="{{route('kelas.store')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputName1">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas_nama" class="form-control" id="exampleInputName1" placeholder="Kelas">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputName1">Kode Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas_kode" class="form-control"  id="exampleInputName1" placeholder="Kelas">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="exampleInputEmail3">Tingkat</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas_tingkat" class="form-control" id="exampleInputEmail3" placeholder="Tingkat">
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