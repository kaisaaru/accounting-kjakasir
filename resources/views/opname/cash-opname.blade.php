@extends('layout.admin')
@section('active-so-barang')
    active
@endsection
@section('active-cash-opnem')
    active
@endsection
@section('judul')
    Opname
@endsection
@section('link')
@endsection
@section('sub-judul')
    Cash Opname
@endsection
@section('aksi-judul')
    Data
@endsection
@section('barang')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card-body">
                @if (session('success'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{!! session('success') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert'); // Change to .alert
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 5000); // 3000 milliseconds = 3 seconds
                    </script>
                @endif
                @if (session('delete'))
                    <div class="alert text-white bg-danger" role="alert">
                        <div class="iq-alert-text">{!! session('delete') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert'); // Change to .alert
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 5000); // 3000 milliseconds = 3 seconds
                    </script>
                @endif
                @if (session('update'))
                    <div class="alert text-white bg-info" role="alert">
                        <div class="iq-alert-text">{!! session('update') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert'); // Change to .alert
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 5000); // 3000 milliseconds = 3 seconds
                    </script>
                @endif
                <div class="iq-header-title">
                    <h4 class="card-title">Cash Opname</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li><button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#tipeModal">Update</button>
                                    <div></div>
                                </li>
                                <li><button type="button" class="btn btn-outline-primary btn-print"
                                        >Print</button>
                                </li>
                            </ul>
                            <form class="position-relative" action="/cash-opnem/print" id="searchForm">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search..." oninput="filterTable()">
                                    {{-- <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search"> --}}
                                    <a class="search-link" href="#" onclick="submitForm(); return false;">
                                        <i class="ri-search-line"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Cash Opname</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                            data-toggle="dropdown">
                                            <i class="ri-more-2-fill"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-pencil-fill mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-printer-fill mr-2"></i>Print</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-file-download-fill mr-2"></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" style="width: 10%">Pecahan</th>
                                                <th scope="col" style="width: 20%">Kertas</th>
                                                <th scope="col" style="width: 20%">Logam</th>
                                                <th scope="col" style="width: 20%">Jumlah</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $index => $row)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <input type="text"
                                                            value="{{ number_format($row->pecahan, 0, ',', '.') }}"
                                                            readonly style="width: 80%"
                                                            name="pecahan{{ $index }}[]"
                                                            id="pecahan{{ $index }}">
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <input type="number" value="{{ $row->kertas }}"
                                                            name="kertas{{ $index }}[]"
                                                            id="kertas{{ $index }}"
                                                            onchange="calculateTotal({{ $index }})" min="0">
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <input type="number" value="{{ $row->logam }}"
                                                            name="logam{{ $index }}[]"
                                                            id="logam{{ $index }}"
                                                            onchange="calculateTotal({{ $index }})"
                                                            min="0">
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <input type="number" value="{{ $row->jumlah }}"
                                                            name="jumlah{{ $index }}[]"
                                                            id="jumlah{{ $index }}" readonly>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <input type="text"
                                                            value="{{ number_format($row->total, 0, ',', '.') }}"
                                                            name="total{{ $index }}"
                                                            id="total{{ $index }}" readonly>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <div class="flex align-items-center list-user-action">
                                                            <button type="reset" data-toggle="tooltip"
                                                                data-placement="top" title="Reset"
                                                                style="border: none; border-radius: 5px;">
                                                                <i class="las la-redo-alt"></i>
                                                            </button>
                                                            {{-- <button type="submit" data-toggle="tooltip"
                                                                    data-placement="top" title="Submit"
                                                                    style="border: none; border-radius: 5px;">
                                                                    <i class="las la-save"></i>
                                                                </button> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-xxl" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-xxl" role="document">
                            <form id="formTambahCashOpnem" action="/cash-opnem/update" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cash Opname : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                            onchange="">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <!-- Bidang formulir Akun awal -->
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pecahan">Pecahan:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="pecahan" name="pecahan" required>
                                                    <option value="" selected disabled>Silahkan Pilih Pecahan
                                                    </option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->pecahan }}">{{ $item->pecahan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="kertas">Kertas:</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="0" class="form-control" id="kertas"
                                                    name="kertas" placeholder="Masukkan Satuan" min="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="logam">Logam:</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="0" class="form-control" id="logam"
                                                    name="logam" placeholder="Masukkan Satuan" min="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="jumlah">Jumlah:</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="0" class="form-control" id="jumlah"
                                                    name="jumlah" placeholder="Masukkan Satuan" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="total">Total:</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="0" class="form-control" id="total"
                                                    name="total" placeholder="Masukkan Satuan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"
                                            id="btnTambahCashOpnem">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#btnTambahCashOpnem").click(function () {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan melakukan pembaruan cash opname!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $("#formTambahCashOpnem").attr("action"),
                            type: $("#formTambahCashOpnem").attr("method"),
                            data: $("#formTambahCashOpnem").serialize(),
                            success: function (response) {
                                Swal.fire({
                                    title: "Success",
                                    text: "Cash opname berhasil diperbarui!",
                                    icon: "success",
                                }).then((value) => {
                                    // Redirect ke rute yang diinginkan setelah berhasil melakukan pembaruan
                                    window.location.href = "/app/relasi";
                                });
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    title: "Error",
                                    text: "Gagal memperbarui cash opname: " + error,
                                    icon: "error",
                                });
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $('.btn-print').click(function() {
            var id = $(this).data('id');
            var action = $(this).data('action');

            Swal.fire({
                title: "Do you want to print?",
                showCancelButton: true,
                confirmButtonText: "Print",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/cash-opnem/print';
                }
            });
        });
    </script>
    <script>
        // Mendapatkan elemen-elemen HTML
        var kertasInput = document.getElementById('kertas');
        var logamInput = document.getElementById('logam');
        var jumlahInput = document.getElementById('jumlah');
        var pecahanSelect = document.getElementById('pecahan');
        var totalInput = document.getElementById('total');

        // Menambahkan event listener untuk perubahan nilai pada bidang kertas dan logam
        kertasInput.addEventListener('input', updateJumlah);
        logamInput.addEventListener('input', updateJumlah);

        // Fungsi untuk mengupdate jumlah
        function updateJumlah() {
            // Mendapatkan nilai dari bidang kertas dan logam
            var kertasValue = parseInt(kertasInput.value) || 0;
            var logamValue = parseInt(logamInput.value) || 0;

            // Menghitung jumlah
            var jumlah = kertasValue + logamValue;

            // Menetapkan nilai jumlah pada input jumlah
            jumlahInput.value = jumlah;

            // Menghitung total
            var pecahanValue = parseInt(pecahanSelect.value) || 0;
            var total = pecahanValue * jumlah;

            // Menetapkan nilai total pada input total
            totalInput.value = total;
        }

        // Menambahkan event listener untuk perubahan nilai pada bidang pecahan
        pecahanSelect.addEventListener('change', updateJumlah);

        // Memanggil fungsi updateJumlah saat halaman dimuat untuk menginisialisasi nilai jumlah dan total
        updateJumlah();
    </script>

    {{-- Function Search --}}
    <script>
        function filterTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table"); // Assuming you have only one table on the page

            // Get all rows in the table body
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                // Use the second column (index 1) for filtering based on the company name
                tdKodeKategori = tr[i].getElementsByTagName("td")[1];
                tdKategoriBarang = tr[i].getElementsByTagName("td")[2];

                if (tdKodeKategori && tdKategoriBarang) {
                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                    txtValueKategoriBarang = tdKategoriBarang.textContent || tdKategoriBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKategoriBarang.toUpperCase().indexOf(filter) > -1
                    ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        function calculateTotal(index) {
            var kertas = parseFloat(document.getElementById('kertas' + index).value) || 0;
            var logam = parseFloat(document.getElementById('logam' + index).value) || 0;
            var pecahan = parseFloat(document.getElementById('pecahan' + index).value.replace(/\./g, '').replace(',',
                '.')) || 0;
            var jumlah = kertas + logam;

            // Hitung total dengan mengalikan pecahan dengan jumlah
            var total = pecahan * jumlah;

            // Perbarui nilai input total dengan format angka yang diinginkan
            document.getElementById('total' + index).value = number_format(total, 0, ',', '.');

            // Perbarui nilai input jumlah
            document.getElementById('jumlah' + index).value = jumlah;
        }

        // Fungsi untuk format angka
        function number_format(number, decimals, dec_point, thousands_sep) {
            // Tambahkan separator ribuan
            var parts = number.toFixed(decimals).toString().split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
            return parts.join(dec_point);
        }
    </script>
@endsection
