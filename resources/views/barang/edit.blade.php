@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-barang')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /tambahbarang
@endsection
@section('sub-judul')
    Daftar Barang
@endsection
@section('aksi-judul')
    Edit
@endsection
@section('barang')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit Barang</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Edit Barang</p>
                    <form class="form-horizontal" action="/barang-update/{{ $data->id }}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Nama Barang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Masukkan Nama Barang" value="{{ $data->nama_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Satuan:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="satuan" name="satuan"
                                    placeholder="Masukkan Satuan" value="{{ $data->satuan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Kategori:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="kategori" name="kategori" required>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->kode_kategori }}"
                                            {{ $data->kategori == $item->kode_kategori ? 'selected' : '' }}>
                                            {{ $item->kode_kategori }} - {{ $item->kategori_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="kelompok">Kelompok
                                Barang:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="kelompok" name="kelompok" required>
                                    <option value="" selected disabled>Pilih Kategori terlebih dahulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Harga Beli:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                    placeholder="Masukkan Harga Beli" value="{{ $data->harga_beli }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Perusahaan:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="perusahaan" name="perusahaan" required>
                                    @foreach ($perusahaan as $item)
                                        @if ($item->jenis == 'Supplier')
                                            <option value="{{ $item->kode_perusahaan }}">
                                                {{ $item->kode_perusahaan }} - {{ $item->nama_perusahaan }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const namaKategori = document.getElementById('kategori');
            const namaKelompok = document.getElementById('kelompok');
            const kelompokOptions = {!! json_encode($kelompokOptions) !!};
            // console.log(kelompokOptions);
            // console.log(namaKategori);
            // console.log(namaKelompok);

            namaKategori.addEventListener('change', function() {
                const selectedBarangId = this.value;
                namaKelompok.innerHTML = '';

                if (selectedBarangId === '') {
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Pilih Kelompok Barang';
                    defaultOption.disabled = true;
                    namaKelompok.appendChild(defaultOption);
                } else {
                    kelompokOptions.forEach(kelompok => {
                        if (kelompok.kode_kategori == selectedBarangId) {
                            const option = document.createElement('option');
                            option.value = kelompok.kode_kelompok;
                            option.textContent = kelompok.kode_kelompok + " - " + kelompok
                                .kelompok_barang;
                            namaKelompok.appendChild(option);
                        }
                    });
                }
            });
        });
    </script>
@endsection
