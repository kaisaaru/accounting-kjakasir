@extends('layout.admin')
@section('active-barang-keluar')
    active
@endsection
@section('active-so')
    active
@endsection
@section('judul')
    Barang Keluar
@endsection
@section('link')
    /dataOP
@endsection
@section('sub-judul')
    Barang Keluar
@endsection
@section('aksi-judul')
    Order Penjualan
@endsection
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
                    <h4 class="card-title">Daftar Surat Order (SO)</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="window.location.href='/orderPenjualan'">Tambah</button>
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
                                    <h4 class="card-title">Surat Order</h4>
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
                                                <th scope="col">No</th>
                                                <th scope="col">ID SO</th>
                                                <th scope="col">Nama User</th>
                                                <th scope="col">Tanggal SO</th>
                                                <th scope="col">Nama Konsumen</th>
                                                <th scope="col">Detail SO</th>
                                                <th scope="col">Jumlah barang</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Jatuh Tempo</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($OrderPenjualan as $op)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $op->id_so }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $op->user }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $op->tanggal_op }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $op->nama_perusahaan }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $op->detail_op }}
                                                        <button class="btn btn-outline-primary mb-3" data-toggle="modal"
                                                            data-target="#detailop{{ $op->id_so }}">
                                                            Detail
                                                        </button>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        @php
                                                            $totalBarang = 0;
                                                            $diskon = 0;
                                                            $potongan = 0;
                                                            $totalharga = 0;
                                                            $semua = 0;
                                                        @endphp
                                                        @foreach ($detail as $details)
                                                            @foreach ($details as $detaillagi)
                                                                @if ($detaillagi['id_so'] == $op->id_so)
                                                                    @php
                                                                        $totalBarang += $detaillagi['stok']; // yes
                                                                        $stok = $detaillagi['stok'] ?? 0;
                                                                        $harga = $detaillagi['harga'] ?? 0;
                                                                        $diskon = $detaillagi['diskon'] ?? 0;
                                                                        $potongan = $detaillagi['potongan'] ?? 0;

                                                                        // Hitung total diskon
                                                                        $a = $stok * $harga;
                                                                        $b = $a * ($diskon / 100);
                                                                        $c = $stok * $potongan;
                                                                        // Hitung total potongan

                                                                        $totalharga = $a - $b - $c;
                                                                        $semua += $totalharga;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                        {{ number_format($totalBarang ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    {{-- <td>
                                                        @php
                                                            $totalBarang = 0;
                                                            $diskon = 0;
                                                            $potongan = 0;
                                                            $totalharga = 0;
                                                            $semua = 0;
                                                        @endphp
                                                        @foreach ($detail as $details)
                                                            @foreach ($details as $detaillagi)
                                                                @if ($detaillagi['id_so'] == $op->id_so)
                                                                    @php
                                                                        $totalBarang += $detaillagi['stok']; // yes
                                                                        $diskon = $detaillagi['potongan'] / 100;
                                                                        $potongan = $detaillagi['total_harga'] * $diskon;
                                                                        $totalharga = $detaillagi['total_harga'] - $potongan;
                                                                        $semua += $totalharga;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                        {{ number_format($totalBarang ?? 0, 0, ',', '.') }}
                                                    </td> --}}
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ number_format($semua ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $op->status }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $op->jatuh_tempo }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        @if ($op->status == 'Permohonan')
                                                            <button class="btn btn-outline-primary mb-3 btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Approve">Approve</button>
                                                            <button class="btn btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Decline">Decline</button>
                                                        @endif

                                                        @if ($op->status == 'Approve')
                                                            <button class="btn btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Decline">Decline</button>
                                                        @endif
                                                        @if ($op->status == 'Decline')
                                                            <button class="btn btn-outline-primary mb-3 btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Approve">Approve</button>
                                                        @endif
                                                        <a class="btn btn-outline-primary mb-3 btn-print"
                                                            data-id="{{ $op->id_so }}" data-action="Print">Print</a>

                                                        {{-- <button class="btn btn-outline-secondary mb-3" data-toggle="modal"
                                                            data-target="#exampleModal{{ $op->id_so }}">
                                                            Edit
                                                        </button> --}}
                                                        {{-- edit --}}
                                                        <div class="modal fade bd-example-modal-xl"
                                                            id="exampleModal{{ $op->id_so }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Edit Data</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="/dataOP/edit/{{ $op->id_so }}"
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
                                                                                        value="{{ $op->tanggal_op }}">
                                                                                </div>
                                                                                <div class = "col-sm-7">
                                                                                    <select class="form-control"
                                                                                        id="nama_perusahaan"
                                                                                        name="nama_perusahaan">
                                                                                        <option value="" selected
                                                                                            disabled>
                                                                                            {{ $op->nama_perusahaan }}
                                                                                        </option>
                                                                                        @foreach ($Perusahaan as $p)
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
                                                        <div class="modal fade bd-example-modal-xl"
                                                            id="detailop{{ $op->id_so }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-xl" role="document">
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
                                                                        action="/dataOP/detailop/edit/{{ $op->id_so }}"
                                                                        method="post" id="myForm">
                                                                        @csrf
                                                                        <table class="table">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th scope="col">No</th>
                                                                                    {{-- <th scope="col">ID (Unique)</th> --}}
                                                                                    <th scope="col">Barang ID</th>
                                                                                    <th scope="col">Nama Barang</th>
                                                                                    <th scope="col">Kuantitas</th>
                                                                                    <th scope="col">Harga</th>
                                                                                    <th scope="col">Diskon (%)</th>
                                                                                    <th scope="col">Potongan</th>
                                                                                    <th scope="col">Total</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                @php
                                                                                    $no = 1;
                                                                                @endphp
                                                                                @foreach ($detail as $detaillagi)
                                                                                    @foreach ($detaillagi as $details)
                                                                                        @if ($details['id_so'] == $op->id_so)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="id[]"
                                                                                                        value="{{ $loop->iteration }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                                {{-- <td>{{ $no++ }}</td> --}}
                                                                                                {{-- <td>
                                                                                                    <input type="text" class="form-control"
                                                                                                        name="id[]"
                                                                                                        value="{{ $details['id'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td> --}}
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
                                                                                                        readonly
                                                                                                        name="nama_barang[]"
                                                                                                        value="{{ $details['nama_barang'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        name="stok[]"
                                                                                                        value="{{ $details['stok'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        name="harga[]"
                                                                                                        value="{{ $details['harga'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        name="diskon[]"
                                                                                                        value="{{ $details['diskon'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        name="potongan[]"
                                                                                                        value="{{ $details['potongan'] ?? 'N/A' }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        name="total_harga[]"
                                                                                                        value="{{ $details['total_harga'] ?? 'N/A' }}"
                                                                                                        readonly>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        {{-- <div class="modal-footer">
                                                                            <button type="reset" class="btn btn-primary"
                                                                                id="submitButton">Reset</button>
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
                    {{ $OrderPenjualan->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-status').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                const post = 'post';
                // console.log(id, action);
                Swal.fire({
                    title: "Do you want to save the changes?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            // headers: {
                            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            //         'content') // Include CSRF token
                            // },
                            url: '/dataOP/update-status/' + id,
                            data: {
                                status: action
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
                var action = $(this).data('action');

                Swal.fire({
                    title: "Do you want to print the purchase order?",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/dataOP/print/laporan/' + id;
                    }
                });
            });

        });

        // function printAction(id) {
        //     var confirmation = confirm("Apakah anda yakin ingin mengprint laporan ini?");
        //     if (confirmation) {
        //         window.location.href = "/dataOP/print/laporan/" + id;
        //     }
        // }
    </script>



    <script>
        function print(id) {
            var confirmation = confirm("Apakah anda yakin ingin mengprint laporan ini?");
            if (confirmation) {
                window.location.href = "/dataOP/print/laporan/" + id;
            }
        }
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
                tdKategoriBarang = tr[i].getElementsByTagName("td")[4];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[8];

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
    {{-- <script>
        $(document).ready(function() {
            function updateTotalPrice(index) {
                var quantity = parseInt($(`input[name="stok[]"]`).eq(index).val()) || 0;
                var price = parseInt($(`input[name="harga[]"]`).eq(index).val()) || 0;
                var discount = parseInt($(`input[name="diskon[]"]`).eq(index).val()) || 0;
                var potongan = parseInt($(`input[name="potongan[]"]`).eq(index).val()) || 0;

                const a = quantity * price;
                const b = a * (discount / 100);
                const c = quantity * potongan;

                let total = a - b - c;
                // Update the total price input field
                $(`input[name="total_harga[]"]`).eq(index).val(total);
            }
            // Attach event listeners to input fields
            $(document).on('input',
                'input[name^="stok[]"], input[name^="harga[]"], input[name^="diskon[]"],  input[name^="potongan[]"]',
                function() {
                    var index = $(this).closest('tr').index();
                    updateTotalPrice(index);
                });
            // Trigger initial calculation for existing rows
            $('input[name^="stok[]"]').each(function(index) {
                updateTotalPrice(index);
            });
            $('#myForm').submit(function(e) {
                var originalData = getFormData();

                function getFormData() {
                    var formData = [];
                    $('tbody tr').each(function() {
                        var row = {};
                        row.barang_id = $(this).find('input:eq(0)').val();
                        row.nama_barang = $(this).find('input:eq(1)').val();
                        row.stok = $(this).find('input:eq(2)').val();
                        row.harga = $(this).find('input:eq(3)').val();
                        row.diskon = $(this).find('input:eq(4)').val();
                        row.potongan = $(this).find('input:eq(5)').val();
                        row.total_harga = $(this).find('input:eq(6)').val();
                        formData.push(row);
                    });
                    return formData;
                }
            });

        });
    </script> --}}

    {{-- <script>
        function confirmAction(action, id) {
            var confirmation = confirm("Apakah anda yakin ingin " + action + " barang ini?");
            if (confirmation) {
                if (action === "menyetujui") {
                    window.location.href = "/dataOP/Approve/" + id;
                } else if (action === "menolak") {
                    window.location.href = "/dataOP/Decline/" + id;
                }
            } else {
                event.preventDefault();
            }
        }

        function print(id) {
            var confirmation = confirm("Apakah anda yakin ingin mengprint laporan ini?");
            if (confirmation) {
                window.location.href = "/dataOP/print/laporan/" + id;
            }
        }
    </script> --}}

    {{-- <script>
        function schadabush() {
            var confirmation = confirm("Apakah anda yakin ingin mengedit?");
            if (!confirmation) {
                event.preventDefault();
            }
        }
    </script> --}}

    {{-- Function Search --}}
    {{-- <script>
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
                tdKategoriBarang = tr[i].getElementsByTagName("td")[4];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[8];

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
    </script> --}}
@endsection
