@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-kelompok')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /tambahkelompok
@endsection
@section('sub-judul')
    Daftar Kelompok
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
                        <h4 class="card-title">Tambah Kelompok</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Kategori Baru</p>
                    <form class="form-horizontal" action="/kelompok-insert" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Kode
                                Kategori:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="kode_kategori" name="kode_kategori" required>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->kode_kategori }}">
                                            {{ $item->kategori_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Kelompok
                                Barang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kelompok_barang" name="kelompok_barang"
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
