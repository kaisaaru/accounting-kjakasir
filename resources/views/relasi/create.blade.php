@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-relasi')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /tambahrelasi
@endsection
@section('sub-judul')
    Daftar Relasi
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
                        <h4 class="card-title">Tambah Relasi</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Relasi Baru</p>
                    <form class="form-horizontal" action="/relasi-insert" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Nama
                                Perusahaan:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                    placeholder="Masukkan Nama Perusahaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0">Jenis:</label>
                            <div class="col-sm-10">
                                <!-- Add the onchange attribute to the select element to call the showHidePlafon function -->
                                <select class="form-control" id="jenis" name="jenis" onchange="showHidePlafon()">
                                    <option selected="" disabled="">Pilih Jenis</option>
                                    <option value="Supplier">Supplier</option>
                                    <option value="Konsumen">Konsumen</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Alamat
                                Kantor:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="2"
                                    placeholder="Masukkan Alamat Kantor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Alamat
                                Gudang:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="2"
                                    placeholder="Masukkan Alamat Gudang"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Nama
                                Pimpinan:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                                    placeholder="Masukkan Pimpinan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">No. Telepon:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                    placeholder="Masukkan Nomor Telepon">
                            </div>
                        </div>
                        <div class="form-group row" style="display:none;" id="plafonDebit">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="plafon_debit">Plafon
                                Debit:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="plafon_debit" name="plafon_debit"
                                    placeholder="Masukkan Plafon Debit">
                            </div>
                        </div>

                        <div class="form-group row" style="display:none;" id="plafonKredit">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="plafon_kredit">Plafon
                                Kredit:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="plafon_kredit" name="plafon_kredit"
                                    placeholder="Masukkan Plafon Kredit">
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
    <script>
        function toggleInput() {
            var selectBox = document.getElementById("jenis");
            var plafonDebitInput = document.getElementById("plafonDebit");
            var plafonKreditInput = document.getElementById("plafonKredit");

            if (selectBox.value === "Supplier") {
                plafonDebitInput.style.display = "block";
                plafonKreditInput.style.display = "none";
                //plafonDebitInput.setAttribute("", ""); // Tambahkan atribut 
                //plafonKreditInput.removeAttribute(""); // Hapus atribut  jika ada
            } else if (selectBox.value === "Konsumen") {
                plafonDebitInput.style.display = "none";
                plafonKreditInput.style.display = "block";
                //plafonKreditInput.setAttribute("", ""); // Tambahkan atribut 
                //plafonDebitInput.removeAttribute(""); // Hapus atribut  jika ada
            } else {
                plafonDebitInput.style.display = "none";
                plafonKreditInput.style.display = "none";
                //plafonDebitInput.removeAttribute(""); // Hapus atribut  jika ada
                //plafonKreditInput.removeAttribute(""); // Hapus atribut  jika ada
            }
        }
    </script>
    <script>
        function showHidePlafon() {
            var jenisSelect = document.getElementById("jenis");
            var plafonDebit = document.getElementById("plafonDebit");
            var plafonKredit = document.getElementById("plafonKredit");

            if (jenisSelect.value === "Supplier") {
                plafonDebit.style.display = "block";
                plafonKredit.style.display = "none";
            } else if (jenisSelect.value === "Konsumen") {
                plafonDebit.style.display = "none";
                plafonKredit.style.display = "block";
            } else {
                plafonDebit.style.display = "none";
                plafonKredit.style.display = "none";
            }
        }
    </script>
@endsection
