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
    /relasi
@endsection
@section('sub-judul')
    Daftar Relasi
@endsection
@section('aksi-judul')
    Data
@endsection
@section('relasi')
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
                @if (session('error'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{!! session('error') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    {{-- <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert'); // Change to .alert
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 5000); // 3000 milliseconds = 3 seconds
                    </script> --}}
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
                {{-- <div class="iq-header-title">
                    <h4 class="card-title">Daftar Relasi</h4>
                    <a class="btn btn-outline-primary mb-3" href="/tambahrelasi">Tambah</a>
                </div> --}}
                <div class="iq-header-title">
                    <h4 class="card-title">Daftar Perusahaan</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li><button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#tipeModal">Tambah</button>
                                    <div></div>
                                </li>
                            </ul>
                            <form class="position-relative" action="/kategori" id="searchForm">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search" oninput="filterTable()">
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
                                    <h4 class="card-title">Perusahaan</h4>
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
                                                <th scope="col">Nama Perusahaan</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">Alamat Kantor</th>
                                                <th scope="col">Alamat Gudang</th>
                                                <th scope="col">Nama Pimpinan</th>
                                                <th scope="col">No. Telepon</th>
                                                <th scope="col">Plafon Kredit/Debit</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $row->nama_perusahaan }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->jenis }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->alamat_kantor }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->alamat_gudang }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->nama_pimpinan }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->no_telepon }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        @if ($row->jenis == 'Supplier')
                                                            Rp {{ $row->plafon_debit }} (Debit)
                                                        @elseif ($row->jenis == 'Konsumen')
                                                            Rp {{ $row->plafon_kredit }} (Kredit)
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <div class="flex align-items-center list-user-action">
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Edit"
                                                                href="/app/relasi/edit/{{ $row->id }}"><i
                                                                    class="ri-pencil-line"></i></a>
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete"
                                                                href="/app/relasi/delete/{{ $row->id }}"><i
                                                                    class="ri-delete-bin-line"></i></a>
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
                <div class="d-flex justify-content-end">
                    {{ $data->links() }}
                </div>
                {{-- Tambah Kategori --}}
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-xl" tabindex="1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-xl" role="document">
                            <form action="/relasi-insert" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Perusahaan : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                            onchange="">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <!-- Bidang formulir Akun awal -->
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="email">Nama
                                                Perusahaan:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_perusahaan"
                                                    name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0">Jenis:</label>
                                            <div class="col-sm-10">
                                                <!-- Add the onchange attribute to the select element to call the showHidePlafon function -->
                                                <select class="form-control" id="jenis" name="jenis"
                                                    onchange="showHidePlafon()">
                                                    <option selected="" disabled="">Pilih Jenis</option>
                                                    <option value="Supplier">Supplier</option>
                                                    <option value="Konsumen">Konsumen</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">Alamat
                                                Kantor:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="2"
                                                    placeholder="Masukkan Alamat Kantor"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">Alamat
                                                Gudang:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="2"
                                                    placeholder="Masukkan Alamat Gudang"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">Nama
                                                Pimpinan:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pimpinan"
                                                    name="nama_pimpinan" placeholder="Masukkan Pimpinan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">No. Telepon:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="no_telepon"
                                                    name="no_telepon" placeholder="Masukkan Nomor Telepon">
                                            </div>
                                        </div>
                                        <!-- disini -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="btnTambahAkun">Tambah
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add jQuery and Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your custom JavaScript to show the notification -->


    <!-- JavaScript to trigger the toast notification -->
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
                tdNamaPerusahaan = tr[i].getElementsByTagName("td")[1];
                tdJenis = tr[i].getElementsByTagName("td")[2];
                tdNamaPimpinan = tr[i].getElementsByTagName("td")[5];

                if (tdNamaPerusahaan && tdJenis && tdNamaPimpinan) {
                    txtValueNamaPerusahaan = tdNamaPerusahaan.textContent || tdNamaPerusahaan.innerText;
                    txtValueJenis = tdJenis.textContent || tdJenis.innerText;
                    txtValueNamaPimpinan = tdNamaPimpinan.textContent || tdNamaPimpinan.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueNamaPerusahaan.toUpperCase().indexOf(filter) > -1 ||
                        txtValueJenis.toUpperCase().indexOf(filter) > -1 ||
                        txtValueNamaPimpinan.toUpperCase().indexOf(filter) > -1
                    ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
