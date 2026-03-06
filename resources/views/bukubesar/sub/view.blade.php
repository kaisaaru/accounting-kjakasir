@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-subbukuBesar')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /subbukuBesar
@endsection
@section('sub-judul')
    Daftar Sub Buku Besar
@endsection
@section('aksi-judul')
    Data
@endsection
@section('barang')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card-body">
                <div class="iq-header-title">
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
                    @if (session('error'))
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-text">{!! session('error') !!}</div>
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
                        <h4 class="card-title">Daftar Sub Buku Besar</h4>
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
                </div>
                <p></p>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Akun Buku Besar</th>
                            <th scope="col">No. Sub Buku Besar</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    </strong>
                                    {{ $row->no_bukubesar }}
                                    </strong>
                                </td>
                                <td>
                                    {{ $row->no_subbukubesar }}
                                </td>
                                <td>
                                    {{ $row->ket }}
                                </td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit" href="/subbukuBesar/edit/{{ $row->id }}"><i
                                                class="ri-pencil-line"></i></a>
                                        {{-- <a data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete" href="/barang-delete/{{ $row->id }}"><i
                                                class="ri-delete-bin-line"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Tambah Kelompok --}}
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <form action="/subbukuBesar/insert" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Sub Buku Besar : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                            onchange="">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <!-- Bidang formulir Akun awal -->
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Akun
                                                Buku Besar:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="no_bukubesar" name="no_bukubesar" required>
                                                    @foreach ($bukubesar as $item)
                                                        <option value="{{ $item->no_bukubesar }}">
                                                            {{ $item->no_bukubesar }} - {{ $item->ket }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="email">No. SubBuku Besar:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="no_subbukubesar"
                                                    name="no_subbukubesar" placeholder="Masukkan Nomor Buku Besar">
                                                {{-- value="{{ $previousNoSubBukuBesar + 1 }}"> --}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                for="email">Keterangan :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ket" name="ket"
                                                    placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <!-- Bidang formulir Akun yang dapat diulang akan ditambahkan di sini secara dinamis -->
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
