@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-kategori')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /tambahkategori
@endsection
@section('sub-judul')
    Daftar Kategori
@endsection
@section('aksi-judul')
    Tambah
@endsection
@section('barang')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Tambah Kategori</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Kategori Baru</p>
                    <form class="form-horizontal" action="/kategori-insert" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Kategori
                                Barang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kategori_barang" name="kategori_barang"
                                    placeholder="Masukkan Kategori Barang">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
