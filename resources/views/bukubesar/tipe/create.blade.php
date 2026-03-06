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
                        <h4 class="card-title">Tambah Tipe Akun</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Kategori Baru</p>
                    <form class="form-horizontal" action="/tipeAkun/insert" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Tipe :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tipe" name="tipe" required
                                    onchange="handleSelectChange()">
                                    <option selected="" disabled="" value="-">Pilih Jenis Buku Besar</option>
                                    <option value="Aktiva Lancar" data-input="inputAktivaLancar">Aktiva Lancar</option>
                                    <option value="Aktiva Tetap" data-input="inputAktivaTetap">Aktiva Tetap</option>
                                    <option value="Kewajiban Lancar" data-input="inputKewajibanLancar">Kewajiban Lancar
                                    </option>
                                    <option value="Modal Dan Cadangan" data-input="inputModalCadangan">Modal Dan Cadangan
                                    </option>
                                </select>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initial state
            if ($('#french').prop('checked')) {
                $('#selectContainer').show();
            } else {
                $('#selectContainer').hide();
            }

            // Toggle visibility on checkbox change
            $('#french').change(function() {
                if ($(this).prop('checked')) {
                    $('#selectContainer').show();
                } else {
                    $('#selectContainer').hide();
                }
            });
        });
    </script>

    <script>
        function handleSelectChange() {
            var select = document.getElementById("tipe");
            var selectedOption = select.options[select.selectedIndex];
            var inputType = selectedOption.getAttribute("data-input");

            // Hapus semua elemen input sebelumnya
            var form = document.getElementById("yourFormId");
            var existingInputs = form.getElementsByClassName("additional-input");
            while (existingInputs[0]) {
                existingInputs[0].parentNode.removeChild(existingInputs[0]);
            }

            // Tambahkan elemen input sesuai dengan opsi yang dipilih
            if (inputType) {
                var inputElement = document.createElement("input");
                inputElement.type = "text";
                inputElement.name = inputType;
                inputElement.placeholder = "Masukkan data tambahan...";
                inputElement.className = "form-control additional-input";
                form.appendChild(inputElement);
            }
        }
    </script>
@endsection
