@extends('layout.admin')

@section('active-barang-masuk', 'active')

@section('active-pb', 'active')

@section('judul', 'Barang Masuk')

@section('link', '/dataPB')

@section('sub-judul', 'Barang Masuk')

@section('aksi-judul', 'Penerimaan Barang')

@section('barangmasuk')
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
                    <h4 class="card-title">Daftar Penerimaan Barang (PB)</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="window.location.href='/PenerimaanBarang'">Tambah</button>
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
                                    <h4 class="card-title">Penerimaan Barang</h4>
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
                                                <th scope="col">ID PBarang</th>
                                                <th scope="col">ID POrder</th>
                                                {{-- <th scope="col">User</th> --}}
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Detail PO</th>
                                                <th scope="col">Detail PB</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($PenerimaanBarang as $pb)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $pb->id_pb }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $pb->id_po }}</strong>
                                                    </td>
                                                    {{-- <td>
                                                        {{ $pb->user }}
                                                    </td> --}}
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $pb->tanggal_pb }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{-- {{ $pb->detail_po }} --}}
                                                        <button class="btn btn-outline-primary mb-3" data-toggle="modal"
                                                            data-target="#detailpo{{ $pb->id_po }}">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{-- {{ $pb->detail }} --}}
                                                        <button class="btn btn-outline-primary mb-3" data-toggle="modal"
                                                            data-target="#ubahPB{{ $pb->id_pb }}">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $pb->status }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        @if ($pb->status == 'Permohonan')
                                                            <button class="btn btn-outline-primary btn-status"
                                                                data-id="{{ $pb->id_pb }}"
                                                                data-action="Approve">Approve</button>
                                                        @endif
                                                        @if ($pb->status == 'Approve')
                                                            <button class="btn btn-outline-warning btn-faktur"
                                                                data-id="{{ $pb->id_pb }}"
                                                                data-id2="{{ $pb->id_po }}">Faktur</button>
                                                            <button class="btn btn-outline-warning btn-status"
                                                                data-id="{{ $pb->id_pb }}"
                                                                data-action="Decline">Batal</button>
                                                            <a class="btn btn-outline-primary btn-print"
                                                                data-id="{{ $pb->id_pb }}"
                                                                data-id2="{{ $pb->id_po }}">Print</a>
                                                        @endif
                                                        @if ($pb->status == 'Faktur')
                                                            {{-- <button class="btn btn-outline-warning btn-status"
                                                                ('menolak', '{{ $pb->id_pb }}')">Batal</button> --}}
                                                            <a class="btn btn-outline-primary btn-print"
                                                                data-id="{{ $pb->id_pb }}"
                                                                data-id2="{{ $pb->id_po }}">Print</a>
                                                        @endif
                                                        @if ($pb->status == 'Decline')
                                                            <button class="btn btn-outline-primary btn-status"
                                                                data-id="{{ $pb->id_pb }}"
                                                                data-action="Approve">Approve</button>
                                                        @endif

                                                        {{-- edit --}}
                                                        <div class="modal fade bd-example-modal-lg"
                                                            id="exampleModal{{ $pb->id_pb }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Edit Data</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="/dataPO/edit/{{ $pb->id_pb }}"
                                                                        method="get" id="editPB">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="modal-group row">
                                                                                <div class="col-sm-3">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="nama_barang"
                                                                                        name="nama_barang"
                                                                                        placeholder="Masukkan nama barang"
                                                                                        required
                                                                                        value="{{ $pb->tanggal_pb }}">
                                                                                </div>
                                                                                <div class = "col-sm-7">
                                                                                    <select class="form-control"
                                                                                        id="nama_perusahaan"
                                                                                        name="nama_perusahaan">
                                                                                        <option value="" selected
                                                                                            disabled>
                                                                                            {{ $pb->nama_perusahaan }}
                                                                                        </option>
                                                                                        @foreach ($perusahaan as $p)
                                                                                            <option
                                                                                                value="{{ $p->kode_perusahaan }}">
                                                                                                {{ $p->kode_perusahaan }} -
                                                                                                {{ $p->nama_perusahaan }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary"
                                                                                id="submitButton"
                                                                                onclick="schadabush()">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--  --}}
                                                        <div class="modal fade bd-example-modal-lg"
                                                            id="detailpo{{ $pb->id_po }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Detail PO</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="/dataPO/detailpo/edit/{{ $pb->id_po }}"
                                                                        method="get" id="myForm">
                                                                        @csrf
                                                                        <table class="table">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th scope="col">No</th>
                                                                                    {{-- <th scope="col">ID (Unique)</th> --}}
                                                                                    <th scope="col">Barang ID</th>
                                                                                    <th scope="col">Nama Barang</th>
                                                                                    <th scope="col">Kuantitas</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                @php
                                                                                    $no = 1;
                                                                                @endphp
                                                                                @foreach ($detailpo as $detaillagi)
                                                                                    @foreach ($detaillagi as $details)
                                                                                        @if ($details['id_po'] == $pb->id_po)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        value="{{ $loop->iteration }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td hidden>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="id[]"
                                                                                                        value="{{ $details['id'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
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
                                                                                                    <input type="text"
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
                                                        <div class="modal fade bd-example-modal-lg"
                                                            id="ubahPB{{ $pb->id_pb }}" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Detail PB</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="/dataPB/detailpb/edit/{{ $pb->id_pb }}"
                                                                        method="get" id="myForm">
                                                                        @csrf
                                                                        <table class="table">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th scope="col">No</th>
                                                                                    {{-- <th scope="col">ID (Unique)</th> --}}
                                                                                    <th scope="col">Barang ID</th>
                                                                                    <th scope="col">Nama Barang</th>
                                                                                    <th scope="col">Kuantitas</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                @php
                                                                                    $no = 1;
                                                                                @endphp
                                                                                @foreach ($detailpb as $detaillagi)
                                                                                    @foreach ($detaillagi as $details)
                                                                                        @if ($details['id_pb'] == $pb->id_pb)
                                                                                            <tr>
                                                                                                {{-- <td>{{ $no++ }}</td> --}}
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        value="{{ $loop->iteration }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                <td hidden>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="id[]"
                                                                                                        value="{{ $details['id'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
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
                                                                                                    <input type="text"
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
                    {{ $PenerimaanBarang->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-status').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                // console.log(id);
                // console.log(action);
                const post = 'post';
                // // console.log(id, action);
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
                            // },  /dataPB/{status}/{id}
                            url: '/dataPB/' + action + '/' + id,
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
                        window.location.href = '/laporan/print/' + id2 + '/' + id;
                    }
                });
            });
            $('.btn-faktur').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: "Apakah ingin membuat faktur?",
                    showCancelButton: true,
                    confirmButtonText: "Faktur",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/faktur/' + id;
                    }
                });
            });

        });
    </script>

    <script>
        // function schadabush() {
        //     $('.btn-faktur').click(function() {
        //         var id = $(this).data('id');
        //         var id2 = $(this).data('id2');
        //         var action = $(this).data('action');

        //         Swal.fire({
        //             title: "Apakah ingin membuat faktur?",
        //             showCancelButton: true,
        //             confirmButtonText: "Faktur",
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 window.location.href = '/faktur/' + id;
        //             }
        //         });
        //     });
        // }
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
