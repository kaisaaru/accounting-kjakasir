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
    /kelompok
@endsection
@section('sub-judul')
    Daftar Kelompok
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
                    <h4 class="card-title">Daftar Kelompok</h4>
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
                                    <h4 class="card-title">Kelompok</h4>
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
                                                <th scope="col">Kode Kelompok</th>
                                                <th scope="col">Kode Kategori</th>
                                                <th scope="col">Kelompok Barang</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($kelompokData as $row)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $row->kode_kelompok }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->kode_kategori }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $row->kelompok_barang }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="btn-edit" data-toggle="tooltip" data-placement="top"
                                                                title="Edit" href="/kelompok-edit/{{ $row->id }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                            <!-- Tautan untuk Delete -->
                                                            <a class="btn-delete" data-toggle="tooltip"
                                                                data-placement="top" title="Delete"
                                                                href="/kelompok-delete/{{ $row->id }}">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
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
                    {{ $kelompokData->links() }}
                </div>
                {{-- Tambah Kelompok --}}
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <form id="formTambahKelompok">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Kelompok : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <!-- Bidang formulir Akun awal -->
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="email">Kode Kategori:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="kode_kategori" name="kode_kategori"
                                                    required>
                                                    @foreach ($kategoriData as $item)
                                                        <option value="{{ $item->kode_kategori }}">
                                                            {{ $item->kode_kategori }} - {{ $item->kategori_barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="email">Kelompok Barang:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kelompok_barang"
                                                    name="kelompok_barang" placeholder="Masukkan Kategori Barang">
                                            </div>
                                        </div>
                                        <!-- Bidang formulir Akun yang dapat diulang akan ditambahkan di sini secara dinamis -->
                                    </div>
                                    <!-- disini -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            id="btnTambahKelompok">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            // Edit link
            $('.btn-edit').click(function(e) {
                e.preventDefault();
                var url = $(this).attr('href');

                Swal.fire({
                    title: 'Edit Data?',
                    text: "Apakah Anda ingin mengedit data ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Edit'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the edit page
                        window.location.href = url;
                    }
                });
            });

            // Delete link
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                var url = $(this).attr('href');

                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Apakah Anda yakin ingin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform delete action using Ajax
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data telah dihapus.',
                                    'success'
                                ).then((value) => {
                                    // Reload the page or perform any other action after deletion
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error!',
                                    'Gagal menghapus data: ' + error,
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#btnTambahKelompok").click(function() {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan menambah kelompok!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willAdd) => {
                    if (willAdd) {
                        $.ajax({
                            url: "/kelompok-insert",
                            type: "POST",
                            data: $("#formTambahKelompok").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Kelompok berhasil ditambahkan!'
                                }).then((value) => {
                                    window.location.href =
                                        "/kelompok"; // Pindah ke rute /app/relasi setelah berhasil menambah kelompok
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal menambah kelompok: ' + error,
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
                tdKodeKelompok = tr[i].getElementsByTagName("td")[1];
                tdKodeKategori = tr[i].getElementsByTagName("td")[2];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[3];

                if (tdKodeKelompok && tdKodeKategori && tdKelompokBarang) {
                    txtValueKodeKelompok = tdKodeKelompok.textContent || tdKodeKelompok.innerText;
                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                    txtValueKelompokBarang = tdKelompokBarang.textContent || tdKelompokBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueKodeKelompok.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
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
