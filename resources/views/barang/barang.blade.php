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
    /barang
@endsection
@section('sub-judul')
    Daftar Barang
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
                {{-- <div class="iq-header-title">
                    <h4 class="card-title">Daftar Relasi</h4>
                    <a class="btn btn-outline-primary mb-3" href="/tambahrelasi">Tambah</a>
                </div> --}}
                <div class="iq-header-title">
                    <h4 class="card-title">Daftar Barang</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li><button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#tipeModal">Tambah</button>
                                    <div></div>
                                </li>
                                <li><button type="button" class="btn btn-outline-primary btn-print-stok-opnem"
                                        href="/barang-print">
                                        Print
                                    </button>
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
                                    <h4 class="card-title">Barang</h4>
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
                                                <th scope="col">Nomor Barang</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Satuan</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Kelompok Barang</th>
                                                <th scope="col">Sistem</th>
                                                <th scope="col">Phisik</th>
                                                <th scope="col">Selisih</th>
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
                                                        <strong>{{ $row->barang_id }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->nama_barang }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->satuan }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->kategori }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->kelompok }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->stok }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->phisik }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->selisih }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <div class="flex align-items-center list-user-action">
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Edit"
                                                                href="/barang-edit/{{ $row->id }}"><i
                                                                    class="ri-pencil-line .edit-link"></i></a>
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete"
                                                                href="/barang-delete/{{ $row->id }}"><i
                                                                    class="ri-delete-bin-line .edit-link"></i></a>
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Stok Opnem"
                                                                href="/stok-opnem/barang/{{ $row->barang_id }}"><i
                                                                    class="ri-book-line"></i>
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
                {{-- Tambah Kategori --}}
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-xl" role="document">
                            <form id="formTambahBarang">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Barang : </h5>
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
                                                Barang:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_barang"
                                                    name="nama_barang" placeholder="Masukkan Nama Barang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">Satuan:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="satuan" name="satuan"
                                                    placeholder="Masukkan Satuan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">Kategori:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="kategori" name="kategori" required>
                                                    <option value="" selected disabled>
                                                        Silahkan Pilih kategori
                                                    </option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->kode_kategori }}">
                                                            {{ $item->kode_kategori }} - {{ $item->kategori_barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="kelompok">Kelompok
                                                Barang:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="kelompok" name="kelompok" required>
                                                    <option value="" selected disabled>Pilih Kategori terlebih dahulu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="pwd1">Harga Beli:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="harga_beli"
                                                    name="harga_beli" placeholder="Masukkan Harga Beli" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="email">Perusahaan:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="perusahaan" name="perusahaan" required>
                                                    @foreach ($perusahaan as $item)
                                                        @if ($item->jenis == 'Supplier')
                                                            <option value="{{ $item->kode_perusahaan }}">
                                                                {{ $item->kode_perusahaan }} -
                                                                {{ $item->nama_perusahaan }}
                                                            </option>
                                                        @endif
                                                        @if ($item->jenis == 'Konsumen')
                                                            <option value="{{ $item->kode_perusahaan }}">
                                                                {{ $item->kode_perusahaan }} -
                                                                {{ $item->nama_perusahaan }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Bidang formulir Akun yang dapat diulang akan ditambahkan di sini secara dinamis -->
                                    </div>
                                    <!-- disini -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="btnTambahBarang">Tambah
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
    <script>
        $(document).ready(function() {
            $('.btn-print-stok-opnem').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                Swal.fire({
                    title: "Edit",
                    text: "Anda anda ingin membuat laporan stok opnem?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
            $('.print-link').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                Swal.fire({
                    title: "Edit",
                    text: "Anda akan melakukan proses print",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
            $('.edit-link').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                Swal.fire({
                    title: "Edit",
                    text: "Anda akan melakukan proses edit",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Edit",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            // Untuk tautan hapus
            $('.delete-link').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan menghapus data ini.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal",
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: 'Data berhasil dihapus.',
                                    icon: 'success'
                                }).then((value) => {
                                    location
                                        .reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal menghapus data: ' + error,
                                    icon: 'error'
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
        $(document).ready(function() {
            $('#btnTambahBarang').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan menambah barang!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/barang-insert",
                            type: "POST",
                            data: $("#formTambahBarang").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Barang berhasil ditambahkan!',
                                }).then((value) => {
                                    window.location
                                        .reload(); // Refresh halaman setelah berhasil menambahkan barang
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal menambah barang: ' + error,
                                    icon: 'error'
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
                tdNomorBarang = tr[i].getElementsByTagName("td")[1];
                tdNamaBarang = tr[i].getElementsByTagName("td")[2];
                tdKategori = tr[i].getElementsByTagName("td")[4];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[5];

                if (tdNomorBarang && tdNamaBarang && tdKategori && tdKelompokBarang) {
                    txtValueNomorBarang = tdNomorBarang.textContent || tdNomorBarang.innerText;
                    txtValueNamaBarang = tdNamaBarang.textContent || tdNNamaBarang.innerText;
                    txtValueKategori = tdKategori.textContent || tdKategori.innerText;
                    txtValueKelompokBarang = tdKelompokBarang.textContent || tdKelompokBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueNomorBarang.toUpperCase().indexOf(filter) > -1 ||
                        txtValueNamaBarang.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKategori.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKelompokBarang.toUpperCase().indexOf(filter) > -1
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
