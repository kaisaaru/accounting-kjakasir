@extends('layout.admin')

@section('active-barang-keluar', 'active')

@section('active-sj', 'active')

@section('judul', 'Barang Keluar')

@section('link', '/datasj')

@section('sub-judul', 'Barang Keluar')

@section('aksi-judul', 'Surat Jalan')

@section('barangkeluar')
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
                    <h4 class="card-title">Daftar Surat Jalan (SJ)</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="window.location.href='/SuratJalan'">Tambah</button>
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
                    {{-- <a class="btn btn-outline-primary mb-3" href="/purchaseOrder">Tambah</a> --}}
                </div>
                <p></p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Surat Jalan</h4>
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
                                                <th scope="col">ID SO</th>
                                                <th scope="col">ID SJ</th>
                                                {{-- <th scope="col">User</th> --}}
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Detail SO</th>
                                                <th scope="col">Detail SJ</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($SuratJalan as $sj)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $sj->id_so }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $sj->id_sj }}</strong>
                                                    </td>
                                                    {{-- <td>
                                                        {{ $sj->user }}
                                                    </td> --}}
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $sj->tanggal_sj }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{-- {{ $sj->detail_po }} --}}
                                                        <button class="btn btn-outline-primary mb-3" data-toggle="modal"
                                                            data-target="#detailpo{{ $sj->id_so }}">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{-- {{ $sj->detail }} --}}
                                                        <button class="btn btn-outline-primary mb-3" data-toggle="modal"
                                                            data-target="#ubahsj{{ $sj->id_sj }}">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $sj->status }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        @if ($sj->status == 'Permohonan')
                                                            <button class="btn btn-outline-primary mb-3 btn-status"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-action="Approve">Approve</button>
                                                        @endif
                                                        @if ($sj->status == 'Approve')
                                                            <button class="btn btn-outline-warning mb-3 btn-jurnal"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-id2="{{ $sj->id_so }}">Jurnal</button>
                                                            <button
                                                                class="btn
                                                                btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-action="Decline">Batal</button>
                                                            {{-- <a class="btn btn-outline-primary mb-3"
                                                                href="/SJ/laporan/print/{{ $sj->id_so }}/{{ $sj->id_sj }}">Print</a> --}}
                                                        @endif
                                                        @if ($sj->status == 'Jurnal')
                                                            <button class="btn btn-outline-warning mb-3 btn-faktur"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-id2="{{ $sj->id_so }}">Faktur</button>
                                                            <button
                                                                class= "btn
                                                                btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-action="Decline">Batal</button>
                                                            <a class="btn btn-outline-primary mb-3 btn-print"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-id2="{{ $sj->id_so }}">Print</a>
                                                        @endif
                                                        @if ($sj->status == 'Faktur')
                                                            <button class="btn btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-action="Decline">Batal</button>
                                                            <a class="btn btn-outline-primary mb-3 btn-print"
                                                                data-id="{{ $sj->id_sj }}"
                                                                data-id2="{{ $sj->id_so }}">Print</a>
                                                        @endif
                                                        @if ($sj->status == 'Decline')
                                                            -
                                                        @endif

                                                        <div class="modal fade bd-example-modal-lg"
                                                            id="detailpo{{ $sj->id_so }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Detail SO</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="/dataPO/detailpo/edit/{{ $sj->id_so }}"
                                                                        method="get" id="myForm">
                                                                        @csrf
                                                                        <table class="table">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th scope="col">No</th>
                                                                                    <th scope="col">Barang ID</th>
                                                                                    <th scope="col">Nama Barang</th>
                                                                                    <th scope="col">Kuantitas</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                @php
                                                                                    $no = 1;
                                                                                @endphp
                                                                                @foreach ($detailso as $detaillagi)
                                                                                    @foreach ($detaillagi as $details)
                                                                                        @if ($details['id_so'] == $sj->id_so)
                                                                                            <tr>
                                                                                                <td><input type="text"
                                                                                                        class="form-control"
                                                                                                        name="barang_id[]"
                                                                                                        value="{{ $loop->iteration }}"
                                                                                                        readonly></td>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="barang_id[]"
                                                                                                        value="{{ $details['barang_id'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="nama_barang[]"
                                                                                                        value="{{ $details['nama_barang'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        readonly
                                                                                                        name="stok[]"
                                                                                                        value="{{ $details['stok'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade bd-example-modal-lg"
                                                            id="ubahsj{{ $sj->id_sj }}" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Detail SJ</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="/datasj/detailsj/edit/{{ $sj->id_sj }}"
                                                                        method="get" id="myForm">
                                                                        @csrf
                                                                        <table class="table">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th scope="col">No</th>
                                                                                    <th scope="col">Barang ID</th>
                                                                                    <th scope="col">Nama Barang</th>
                                                                                    <th scope="col">Kuantitas</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                @php
                                                                                    $no = 1;
                                                                                @endphp
                                                                                @foreach ($detailsj as $detaillagi)
                                                                                    @foreach ($detaillagi as $details)
                                                                                        @if ($details['id_sj'] == $sj->id_sj)
                                                                                            <tr>
                                                                                                <td><input type="text"
                                                                                                        class="form-control"
                                                                                                        name="barang_id[]"
                                                                                                        value="{{ $loop->iteration }}"
                                                                                                        readonly></td>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="barang_id[]"
                                                                                                        value="{{ $details['barang_id'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="nama_barang[]"
                                                                                                        value="{{ $details['nama_barang'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        name="stok[]"
                                                                                                        value="{{ $details['stok'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        {{-- <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary"
                                                                                id="submitButton">Submit</button>
                                                                        </div> --}}
                                                                    </form>
                                                                </div>
                                                            </div>
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
                    {{ $SuratJalan->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btn-status').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');               
                const post = 'post';
                // console.log(id, action);
                Swal.fire({
                    title: "Apakah yakin ingin mengubah status?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            // headers: {
                            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            //         'content') // Include CSRF token
                            // },  /dataSJ/{status}/{id}
                            url: '/dataSJ/' + action + '/' + id,
                            data: {
                                status: action,
                                id: id
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil mengubah status menjadi ' +
                                        action
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to update status: ' + error,
                                    icon: 'error'
                                });
                                // setTimeout(function() {
                                //     location.reload();
                                // }, 2000);
                            }
                        });

                    }
                });
            });
            $('.btn-print').click(function() {
                var id = $(this).data('id');
                var id2 = $(this).data('id2');

                Swal.fire({
                    title: "Apakah ingin print penerimaan barang?",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/SJ/laporan/print/' + id2 + '/' + id;
                    }
                });
            });
            $('.btn-jurnal').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: "Apakah anda ingin membuat jurnal?",
                    showCancelButton: true,
                    confirmButtonText: "Faktur",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/jurnal/' + id;
                    }
                });
            });
            $('.btn-faktur').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: "Apakah anda ingin membuat faktur?",
                    showCancelButton: true,
                    confirmButtonText: "Faktur",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/fakturjual/' + id;
                    }
                });
            });

        });
    </script>

    <script>
        function schadabush() {
            var confirmation = confirm("Apakah anda yakin ingin mengedit?");
            if (!confirmation) {
                event.preventDefault();
            }
        }
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
                tdKelompokBarang = tr[i].getElementsByTagName("td")[3];

                if (tdKodeKategori && tdKategoriBarang && tdKelompokBarang) {
                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                    txtValueKategoriBarang = tdKategoriBarang.textContent || tdKategoriBarang.innerText;
                    txtValueKelompokBarang = tdKelompokBarang.textContent || tdKelompokBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKategoriBarang.toUpperCase().indexOf(filter) > -1 ||
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
