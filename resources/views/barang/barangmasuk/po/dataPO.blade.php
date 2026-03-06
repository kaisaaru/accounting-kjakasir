@extends('layout.admin')
@section('active-barang-masuk')
    active
@endsection
@section('active-po')
    active
@endsection
@section('judul')
    Barang Masuk
@endsection
@section('link')
    /dataPO
@endsection
@section('sub-judul')
    Barang Masuk
@endsection
@section('aksi-judul')
    Purchase Order
@endsection
@section('barangmasuk')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card-body">
                @if (session('success'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{!! session('success') !!}</div>
                        <button type=   "button" class="close" data-dismiss="alert" aria-label="Close">
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
                    <h4 class="card-title">Daftar Purchase Order (PO)</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="window.location.href='/purchaseOrder'">Tambah</button>
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
                                    <h4 class="card-title">Purchase Order</h4>
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
                                                <th scope="col">ID PO</th>
                                                <th scope="col">Nama User</th>
                                                <th scope="col">Tanggal PO</th>
                                                <th scope="col">Nama Supplier</th>
                                                <th scope="col">Detail PO</th>
                                                <th scope="col">Jumlah barang</th>
                                                {{-- <th scope="col">Diskon</th> --}}
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Jatuh Tempo</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="po-table-body">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($purchaseOrders as $po)
                                                <tr>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        <strong>{{ $po->id_po }}</strong>
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $po->user }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $po->tanggal_po }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $po->nama_perusahaan }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $po->detail_po }}
                                                        <p></p>
                                                        <button class="btn btn-outline-primary mb-3" data-toggle="modal"
                                                            data-target="#detailpo{{ $po->id_po }}">
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
                                                                @if ($detaillagi['id_po'] == $po->id_po)
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
                                                                    {{-- @if ($detaillagi['diskon'] == 0 || $detaillagi['potongan'] == 0)
                                                                    @endif
                                                                    @if ($detaillagi['potongan'] == 0 && $detaillagi['diskon'] == 0)
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
                                                                    @endif --}}
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                        {{ number_format($totalBarang ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    {{-- <td>
                                                        @if ($detailDiskon == '-')
                                                            -
                                                        @else
                                                            {{ $detailTotal - $detailTotal * $detailDiskon }}
                                                        @endif
                                                    </td> --}}
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ number_format($semua ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $po->status }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        {{ $po->jatuh_tempo }}
                                                    </td>
                                                    <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                        @if ($po->status == 'Permohonan')
                                                            <button class="btn btn-outline-primary mb-3 btn-status"
                                                                data-id="{{ $po->id_po }}"
                                                                data-action="Approve">Approve</button>
                                                            <button class="btn btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $po->id_po }}"
                                                                data-action="Decline">Decline</button>
                                                        @endif

                                                        @if ($po->status == 'Approve')
                                                            <button class="btn btn-outline-warning mb-3 btn-status"
                                                                data-id="{{ $po->id_po }}"
                                                                data-action="Decline">Decline</button>
                                                        @endif
                                                        @if ($po->status == 'Decline')
                                                            <button class="btn btn-outline-primary mb-3 btn-status"
                                                                data-id="{{ $po->id_po }}"
                                                                data-action="Approve">Approve</button>
                                                        @endif
                                                        <a class="btn btn-outline-primary mb-3 btn-print"
                                                            data-id="{{ $po->id_po }}" data-action="Print">Print</a>
                                                        {{-- <button class="btn btn-outline-secondary mb-3" data-toggle="modal"
                                                            data-target="#exampleModal{{ $po->id_po }}">
                                                            Edit
                                                        </button> --}}
                                                        {{-- edit --}}
                                                        <div class="modal fade bd-example-modal-lg"
                                                            id="exampleModal{{ $po->id_po }}" tabindex="-1"
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
                                                                    <form action="/dataPO/edit/{{ $po->id_po }}"
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
                                                                                        value="{{ $po->tanggal_po }}">
                                                                                </div>
                                                                                <div class = "col-sm-7">
                                                                                    <select class="form-control"
                                                                                        id="nama_perusahaan{{ $po->id_po }}"
                                                                                        name="nama_perusahaan">
                                                                                        <option value="" selected
                                                                                            disabled>
                                                                                            {{ $po->nama_perusahaan }}
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
                                                                                id="submitButton{{ $po->id_po }}"
                                                                                onclick="schadabush()">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Detail PO  --}}
                                                        <div class="modal fade bd-example-modal-xl"
                                                            id="detailpo{{ $po->id_po }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Detail PO</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close"
                                                                            onclick="hapusPO()">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="/dataPO/detailpo/edit/{{ $po->id_po }}"
                                                                        method="post" id="myForm">
                                                                        @csrf
                                                                        <table class="table">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    {{-- <th scope="col">No</th> --}}
                                                                                    <th scope="col">No</th>
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
                                                                                        @php

                                                                                        @endphp
                                                                                        @if ($details['id_po'] == $po->id_po)
                                                                                            <tr>
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
                                                                                                        value="{{ $loop->iteration }}"
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
                                                                                                    <input type="text"
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
                                                                            <button type="Reset" class="btn btn-primary"
                                                                                id="">Reset</button>
                                                                            <button type="submit" class="btn btn-primary"
                                                                                id="submitButton">Update</button>
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
                </div>>
                <div class="d-flex justify-content-end">
                    {{ $purchaseOrders->links() }}
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
                            url: '/dataPO/update-status/' + id,
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
                        window.location.href = '/dataPO/print/laporan/' + id;
                    }
                });
            });

        });

        function printAction(id) {
            var confirmation = confirm("Apakah anda yakin ingin mengprint laporan ini?");
            if (confirmation) {
                window.location.href = "/dataPO/print/laporan/" + id;
            }
        }
    </script>



    <script>
        function print(id) {
            var confirmation = confirm("Apakah anda yakin ingin mengprint laporan ini?");
            if (confirmation) {
                window.location.href = "/dataPO/print/laporan/" + id;
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
        document.addEventListener('DOMContentLoaded', function() {
            // Get all input elements with name "stok", "harga", "diskon", "total_harga"
            var stokInputs = document.getElementsByName('stok[]');
            var hargaInputs = document.getElementsByName('harga[]');
            var diskonInputs = document.getElementsByName('diskon[]');
            var totalHargaInputs = document.getElementsByName('total_harga[]');

            // Add event listener to each stok input
            stokInputs.forEach(function(stokInput, index) {
                stokInput.addEventListener('input', function() {
                    // Get the values from the corresponding inputs
                    var stok = parseFloat(stokInput.value) || 0;
                    var harga = parseFloat(hargaInputs[index].value) || 0;
                    var diskon = parseFloat(diskonInputs[index].value) || 0;

                    // Calculate total based on the provided formula
                    var total = stok * harga;
                    var all = diskon === 0 ? total : total * (1 - diskon / 100);

                    // Update the corresponding total_harga input
                    totalHargaInputs[index].value = all.toFixed(
                        0); // Adjust decimal places as needed
                });
            });
        });

        $(document).ready(function() {

            // Attach event listeners to input fields
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
                        row.total_harga = $(this).find('input:eq(5)').val();
                        formData.push(row);
                    });
                    return formData;
                }
                // e.preventDefault(); 
                // console.log("Form submitted");
                // // Monitor changes in the input fields
                // $('input').on('input', function() {
                //     // Get the current data
                //     var currentData = getFormData();

                //     // Compare individual input values
                //     var hasChanges = false;
                //     for (var i = 0; i < originalData.length; i++) {
                //         for (var key in originalData[i]) {
                //             if (originalData[i][key] !== currentData[i][key]) {
                //                 hasChanges = true;
                //                 break;
                //             }
                //         }
                //     }

                //     // Show or hide the submit button based on changes
                //     if (hasChanges) {
                //         $('#submitButton').show();
                //     } else {
                //         $('#submitButton').hide();
                //     }
                // });

                // Function to get the current form data

            });

        });
    </script>

    <script>
        function confirmAction(action, id) {
            var confirmation = confirm("Apakah anda yakin ingin " + action + " barang ini?");
            if (confirmation) {
                if (action === "menyetujui") {
                    window.location.href = "/dataPO/Approve/" + id;
                } else if (action === "menolak") {
                    window.location.href = "/dataPO/Decline/" + id;
                }
            } else {
                event.preventDefault();
            }
        }

        function print(id) {
            var confirmation = confirm("Apakah anda yakin ingin mengprint laporan ini?");
            if (confirmation) {
                window.location.href = "/dataPO/print/laporan/" + nama_perusahaan + id;
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
    </script> --}}

    {{-- <script>
        function simpanPO(id_po) {
            sessionStorage.setItem('ID_PO', id_po);
        }

        function hapusPO() {
            sessionStorage.removeItem('ID_PO');
        }
    </script> --}}
@endsection
