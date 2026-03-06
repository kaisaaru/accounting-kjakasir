@extends('layout.admin')
@section('active-payment')
    active
@endsection
@section('active-payment')
    active
@endsection
@section('judul')
    Pembayaran
@endsection
@section('link')
    /pembayaran
@endsection
@section('sub-judul')
    Pembayaran
@endsection
@section('aksi-judul')
    Pembayaran
@endsection
@section('pembayaran')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="content-page" class="content-page">
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
                <a class="btn btn-outline-success mb-3 float-right" href="/dataSJ">Klik disini</a>
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-error');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-success');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        @if (session('status'))
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-status');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Penerimaan Piutang</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <style>
                        .kekanan {
                            float: right;
                            display: inline-block;
                        }
                    </style>
                    <p style="display: inline-block;">Input Pembelian</p>
                    <p id="saldo" for="tanggal_op" class="kekanan" style="display: inline-block;"></p>
                    <form class="form-horizontal" action="/pembayaran" method="POST" id="pembayaranForm">
                        @csrf
                        <input type="hidden" value="{{ auth()->user()->id }}" id= "user_id" name="user_id">
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_payment">Payment Date
                                :
                            </label>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="paymentdate" name="paymentdate"
                                    placeholder="Masukkan paymentdate" value="{{ $tanggalHariIni }}">
                            </div>
                            <label class="control-label col-sm-1 align-self-center mb-0" for="no_payment">No Payment
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="no_payment" name="no_payment" placeholder=""
                                    value="{{ $id_bayar }}" readonly="true">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#jumlahMU">Bayar</button>
                            </div>
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="jumlahMU">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Jumlah Mata Uang (MU)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="number" class="form-control" id="jumlahmu" name="jumlahmu">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" id="submitJumlahMU"
                                                onclick="bayar()">OK</button>
                                            <button type="reset" class="btn btn-primary" id="resetJumlahMU">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="customer">Akun Debet :
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="no_akun" name="no_akun" placeholder=""
                                    readonly>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name_akun" name="name_akun" placeholder=""
                                    readonly>
                            </div>

                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#accountModal" id="akunButton" disabled="true">Cari Akun</button>
                            </div>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="accountModal">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Akun (Pilih satu)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close" onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" id="akunSearch"
                                                placeholder="Search...">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Buku Besar</th>
                                                        <th>Sub Buku besar</th>
                                                        <th>Pilih</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="modalTableBodyAkun">
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($akun as $item)
                                                        @foreach ($item->subBukuBesar as $akunItem)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $item->no_bukubesar }} - {{ $item->ket }}</td>
                                                                <td>
                                                                    {{ $akunItem->no_subbukubesar }} -
                                                                    {{ $akunItem->ket }}
                                                                </td>
                                                                <input type="hidden"
                                                                    value="{{ $akunItem->no_subbukubesar }} - {{ $akunItem->ket }}"
                                                                    id="akunhehe{{ $akunItem->no_subbukubesar }}"
                                                                    name="akunhehe{{ $akunItem->no_subbukubesar }}">
                                                                <td>
                                                                    <input type="checkbox" class="checkbox-input"
                                                                        id="{{ $akunItem->no_subbukubesar }}"
                                                                        value="{{ $akunItem->no_subbukubesar }}">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <p id="notification"></p>
                                            <button type="button" class="btn btn-primary"
                                                id="submitModalAkun">OK</button>
                                            <button type="reset" class="btn btn-primary"
                                                id="resetModalAkun">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="customer">Konsumen: </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="no_konsumen" name="no_konsumen"
                                    placeholder="" readonly>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name_customer" name="name_customer"
                                    placeholder="" readonly>
                            </div>

                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" id="konsumenButton"
                                    data-toggle="modal" data-target="#customerModal" disabled="true">Cari
                                    Konsumen</button>
                            </div>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                id="customerModal">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konsumen (Pilih satu)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" id="customerSearch"
                                                placeholder="Search...">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Konsumen</th>
                                                        <th>Konsumen</th>
                                                        <th>Pilih</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="modalTableBodyCustomer">
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($Perusahaan as $p)
                                                        <tr>
                                                            @if ($p->jenis == 'Konsumen')
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $p->kode_perusahaan }}</td>
                                                                <td>{{ $p->nama_perusahaan }}</td>
                                                                <td>
                                                                    <input type="checkbox" class="checkboxCustomer-input"
                                                                        id="{{ $p->kode_perusahaan }}"
                                                                        value="{{ $p->kode_perusahaan }}">
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    @foreach ($Perusahaan as $p)
                                                        <tr>
                                                            @if ($p->jenis == 'Supplier')
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $p->kode_perusahaan }}</td>
                                                                <td>{{ $p->nama_perusahaan }}</td>
                                                                <td>
                                                                    <input type="checkbox" class="checkboxCustomer-input"
                                                                        id="{{ $p->kode_perusahaan }}"
                                                                        value="{{ $p->kode_perusahaan }}">
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <p id="notification"></p>
                                            <button type="button" class="btn btn-primary"
                                                id="submitModalCustomer">OK</button>
                                            <button type="reset" class="btn btn-primary"
                                                id="resetModalCustomer">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <table class="table table-striped table-bordered " id= "tabelFakturJual">
                                <thead>
                                    <tr>
                                        <th>No. Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Hari</th>
                                        <th>Nilai Faktur</th>
                                        <th>Sisa nilai faktur yang harus dibayar</th>
                                        <th>Pilih</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Sisa</th>
                                    </tr>
                                </thead>
                                <tbody id="modalTableBodyFaktur">

                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submitForm" class="btn btn-primary">Lanjut</button>
                            <button type="reset" id ="resetButton" class="btn iq-bg-danger">Reset</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function formatRibuan(angka) {
            // Mengubah angka menjadi string
            var strAngka = angka.toString();
            var hasil = '';

            // Loop dari belakang untuk menambahkan titik setiap 3 digit
            for (var i = strAngka.length - 1, j = 1; i >= 0; i--, j++) {
                hasil = strAngka[i] + hasil;
                // Tambahkan titik setiap 3 digit, kecuali untuk digit pertama
                if (j % 3 == 0 && i !== 0) {
                    hasil = '.' + hasil;
                }
            }

            return hasil;
        }

        function bayar() {
            var harga = parseInt(document.getElementById('jumlahmu').value);
            if (harga < 100000) {
                alert('Saldo tidak bisa kurang dari Rp. 100.000');
                return;
            }
            var akun = document.getElementById('akunButton');
            // Memformat harga dengan fungsi formatRibuan
            var hargaFormatted = formatRibuan(harga);
            document.getElementById("saldo").innerHTML = "Saldo : Rp." + hargaFormatted;
            sessionStorage.setItem('saldo', harga);
            akun.disabled = false;
            $('#jumlahMU').modal('hide');
        };

        function formatInput(input) {
            // Mengambil nilai yang dimasukkan
            var nilai = input.value;
            // Menghapus semua karakter non-digit (seperti titik pemisah ribuan)
            var nilaiTanpaTitik = nilai.replace(/\D/g, '');
            // Mengonversi ke bilangan bulat
            var nilaiBilanganBulat = parseInt(nilaiTanpaTitik);
            // Mengformat nilai dengan titik sebagai pemisah ribuan
            var nilaiFormatted = nilaiBilanganBulat.toLocaleString();
            // Menetapkan nilai yang diformat ke input
            input.value = nilaiFormatted;
            // Menetapkan nilai asli (tanpa titik) ke atribut data-value
            input.setAttribute('data-value', nilaiBilanganBulat);
        }
    </script>
    {{--  --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var konsumen = document.getElementById('konsumenButton');
            var modalTableBodyFaktur = document.getElementById('modalTableBodyFaktur');
            const dataFakturJual = {!! json_encode(['faktur' => $faktur]) !!};
            const dataFakturBeli = {!! json_encode(['paktur' => $paktur]) !!};
            const dataDetailPembayaran = {!! json_encode(['detail' => $detail]) !!};
            // Search functionality
            $('#akunSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                const rows = document.querySelectorAll('#modalTableBodyAkun tr');

                rows.forEach(row => {
                    const rowData = Array.from(row.cells).map(cell => cell.textContent
                        .toLowerCase());
                    const rowVisible = rowData.some(data => data.includes(searchTerm));

                    row.style.display = rowVisible ? '' : 'none';
                });
            });

            // Single checkbox selection
            $('.checkbox-input').on('change', function() {
                if ($(this).prop('checked')) {
                    $('.checkbox-input').not(this).prop('checked', false);
                }
            });

            // Handling click event on table rows
            $('#modalTableBodyAkun').on('click', 'tr', function() {
                const checkbox = $(this).find('.checkbox-input');
                checkbox.prop('checked', !checkbox.prop('checked'));
                $('.checkbox-input').not(checkbox).prop('checked', false);
            });




            // var hargFormatted = formatRibuan(updatedBalance);
            //         document.getElementById("bayarmu").innerHTML = "Saldo Tersimpan : Rp." + hargaFormatted;



            function formatDate(dateString) {
                const date = new Date(dateString);
                if (isNaN(date.getTime())) {
                    return "Invalid Date";
                } else {
                    const day = String(date.getDate()).padStart(2, '0');
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const year = date.getFullYear();
                    return `${day}/${month}/${year}`;
                }
            }


            $('#submitModalCustomer').on('click', function() {
                const checkedCheckbox = $('.checkboxCustomer-input:checked');
                if (checkedCheckbox.length > 0) {
                    const noCustomer = checkedCheckbox.attr('id');
                    const nameCustomer = checkedCheckbox.closest('tr').find('td:nth-child(3)').text();
                    $('#no_konsumen').val(noCustomer);
                    $('#name_customer').val(nameCustomer);
                    $('#customerModal').modal('hide');
                } else {
                    $('#no_konsumen').val('');
                    $('#name_customer').val('');
                }
            });
            var saldoSebelumnya = parseInt(sessionStorage.getItem('saldo')) || 0;

            $('#submitModalCustomer').on('click', function() {
                var noKonsumenValue = $("#no_konsumen").val();
                var noAkunValue = $("#no_akun").val();
                var tbody = $("#tabelFakturJual tbody");
                var konsumenJenis = noKonsumenValue.split('-')[0];
                // console.log(konsumenJenis);
                // Event listener untuk checkbox
                $(document).on('change', 'input[id^="cb"]', function() {
                    var id = $(this).attr('id').replace('cb',
                        ''); // Dapatkan ID faktur dari checkbox
                    var jumlahInput = $("#jumlah_" + id); // Dapatkan input jumlah_

                    // Jika checkbox diceklis
                    if ($(this).is(":checked")) {
                        jumlahInput.prop('disabled', false); // Aktifkan input jumlah_
                    } else {
                        // Jika checkbox tidak diceklis
                        jumlahInput.prop('disabled', true); // Nonaktifkan input jumlah_
                        var jumlah = parseFloat(jumlahInput.val()); // Dapatkan nilai input jumlah_

                        // Kembalikan saldo ke nilai sebelumnya
                        var jumlahSebelumnya = parseFloat(jumlahInput.attr('data-sebelumnya')) ||
                            0; // Dapatkan nilai sebelumnya
                        var saldoSebelumInput = parseFloat(sessionStorage.getItem('saldo')) + (
                            jumlah - jumlahSebelumnya);
                        sessionStorage.setItem('saldo',
                            saldoSebelumInput); // Update saldo kembali ke nilai sebelum input
                        $("#saldo").text("Saldo: Rp." + formatRibuan(
                            saldoSebelumInput)); // Update tampilan saldo
                        jumlahInput.val(''); // Kembalikan nilai input ke nilai sebelumnya
                    }
                });

                // Function to update remaining balance dynamically
                function updateRemainingBalance(id) {
                    var inputId = id.split('_')[1]; // Extract the ID of the input field
                    var jumlahInput = $("#jumlah_" + inputId); // Cache input field
                    var jumlah = parseFloat(jumlahInput.val()); // Get the new value entered
                    var jumlahSebelumnya = parseFloat(jumlahInput.attr('data-sebelumnya')) ||
                        0; // Get the previous value 
                    var sisaAwal = parseFloat($("#sisa_" + inputId).attr(
                        'data-awal')); // Get the initial remaining balance

                    // Get the current saldo
                    var saldo = parseFloat(sessionStorage.getItem('saldo'));
                    if (isNaN(saldo)) {
                        saldo = 0;
                    }

                    // Jika input kosong, kembalikan nilainya ke nilai awal
                    if (isNaN(jumlah) || jumlah === 0) {
                        jumlahInput.val(jumlahSebelumnya); // Set nilai input ke nilai sebelumnya
                        return 0;
                    }

                    var sisa = sisaAwal - jumlah; // Calculate the new remaining balance

                    // Kurangi jumlah input jika sisa kurang dari atau sama dengan 0
                    if (sisa <= 0) {
                        var kurangi = jumlah - Math.abs(sisa);
                        if (kurangi < 0) {
                            return;
                        }
                        jumlahInput.val(kurangi);
                        jumlah = kurangi; // Update nilai jumlah setelah pengurangan
                        sisa = 0; // Set sisa menjadi 0
                    }

                    if (jumlah <= 0 || isNaN(jumlah)) {
                        return 0;
                    }

                    // Hitung saldo setelah pengurangan
                    var saldoSetelahPengurangan = saldo - (jumlah - jumlahSebelumnya);

                    // Validasi saldo tidak boleh negatif
                    if (saldoSetelahPengurangan < 0) {
                        // Set nilai input kembali ke nilai sebelumnya
                        jumlahInput.val(jumlahSebelumnya);
                        return 0;
                    }

                    // Hitung perubahan saldo
                    var perubahan = jumlah - jumlahSebelumnya;
                    saldo -= perubahan; // Update saldo after deduction
                    sessionStorage.setItem('saldo', saldo); // Save the updated saldo
                    $("#saldo").text("Saldo: Rp." + formatRibuan(saldo)); // Update saldo display
                    jumlahInput.attr('data-sebelumnya', jumlah); // Update previous value
                    $("#sisa_" + inputId).val(sisa); // Update the remaining balance field

                    return 0;
                }




                // Function to update saldo
                function updateSaldo(sisa) {
                    var saldo = parseInt(sessionStorage.getItem('saldo')); // Get current saldo
                    saldoSebelumnya = saldo; // Save the current saldo as saldoSebelumnya
                    sessionStorage.setItem('saldo', saldo - sisa); // Update saldo after deduction
                    $("#saldo").text("Saldo: Rp." + formatRibuan(saldo - sisa)); // Update saldo display
                }

                // Function to revert saldo to previous value (undo)
                function undoSaldo() {
                    sessionStorage.setItem('saldo', saldoSebelumnya); // Restore saldo from saldoSebelumnya
                    $("#saldo").text("Saldo: Rp." + formatRibuan(saldoSebelumnya)); // Update saldo display
                }

                // Event listener for changes in input fields starting with 'jumlah_'
                $(document).on('input', 'input[id^="jumlah_"]', function() {
                    updateRemainingBalance($(this).attr(
                        'id')); // Call the function to update remaining balance
                });

                // Event listener for undo action
                $('#undoButton').on('click', function() {
                    undoSaldo(); // Call the function to revert saldo to previous value
                });

                function populateModalTable(fakturList, pakturList, detailList) {
                    if (noAkunValue !== "") {
                        // console.log("Input no_akun ada nilai");
                        var sisa = 0;
                        var fakturFound = false;
                        tbody.empty(); // Kosongkan tabel sebelum menambahkan baris baru                    
                        var cek = typeof detail;
                        if (cek === 'undefined') {
                            if (konsumenJenis === 'K') {
                                fakturList.forEach(faktur => {
                                    // console.log(noAkunValue + ' ' + noKonsumenValue + ' ' + faktur
                                        .no_subbukubesar + ' ' + faktur.kode_perusahaan);
                                    if (faktur.no_subbukubesar === noAkunValue && faktur
                                        .kode_perusahaan === noKonsumenValue) {
                                        const today = new Date();
                                        const jatuhTempo = new Date(faktur.jatuh_tempo);
                                        const differenceInDays = Math.floor((
                                            jatuhTempo -
                                            today) / (1000 * 60 * 60 * 24));

                                        if (faktur.kredit != 0) {
                                            var sisatotalpunyalo = 0;
                                            var sisaawalpunyalo = 0;
                                            var total = 0;
                                            const row = `
                                        <tr>
                                        <td>${faktur.id_fj}</td>
                                        <td>${formatDate(faktur.tanggal_sj)}</td>
                                        <td>${formatDate(faktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>                
                                        <td><input type='number' class='form-control' value='${faktur.kredit}'  name='nilaifaktur[]' readonly='true'></td>
                                        <td><input type='number' class='form-control' value='${faktur.kredit - (sisatotalpunyalo - sisaawalpunyalo)}' id='sisanilaiawal_${faktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${faktur.id_fj}' id='cb${faktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${faktur.id_fj}' id='jumlah_${faktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${faktur.kredit}' id='sisa_${faktur.id_fj}'  name='sisa[]' data-awal='${faktur.kredit - total}' readonly="true"></td>
                                    </tr>`;
                                            tbody.append(row);
                                        }
                                        if (faktur.debit != 0) {
                                            var sisatotalpunyalo = 0;
                                            var sisaawalpunyalo = 0;
                                            var total = 0;
                                            const row = `
                                <tr>
                                    <td>${faktur.id_fj}</td>
                                        <td>${formatDate(faktur.tanggal_sj)}</td>
                                        <td>${formatDate(faktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>       
                                        <td><input type='number' class='form-control' value='${faktur.debit}'  name='nilaifaktur[]' readonly='true'></td>                                        
                                        <td><input type='number' class='form-control' value='${faktur.debit - total}' id='sisanilaiawal_${faktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${faktur.id_fj}' id='cb${faktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${faktur.id_fj}' id='jumlah_${faktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${faktur.debit - total}' id='sisa_${faktur.id_fj}'  name='sisa[]' data-awal='${faktur.debit - total}' readonly="true"></td>
                                </tr>`;
                                            tbody.append(row);
                                        }
                                        fakturFound = true;
                                    }

                                });
                            }
                            if (konsumenJenis === 'S') {
                                pakturList.forEach(paktur => {
                                    if (paktur.no_subbukubesar === noAkunValue && paktur
                                        .kode_perusahaan === noKonsumenValue) {
                                        const today = new Date();
                                        const jatuhTempo = new Date(paktur.jatuh_tempo);
                                        const differenceInDays = Math.floor((
                                            jatuhTempo -
                                            today) / (1000 * 60 * 60 * 24));

                                        if (paktur.kredit != 0) {
                                            var sisatotalpunyalo = 0;
                                            var sisaawalpunyalo = 0;
                                            var total = 0;
                                            if (paktur.id_fj === detail.id_faktur) {
                                                var sisaawalpunyalo = detail
                                                    .nilai_faktur;
                                                var sisatotalpunyalo = detail
                                                    .sisa_pembayaran;
                                                var total = sisaawalpunyalo -
                                                    sisatotalpunyalo;
                                            }
                                            // console.log(sisaawalpunyalo);
                                            // console.log(sisatotalpunyalo);
                                            // console.log(total);
                                            const row = `
                                        <tr>
                                        <td>${paktur.id_fj}</td>
                                        <td>${formatDate(paktur.tanggal_sj)}</td>
                                        <td>${formatDate(paktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>                
                                        <td><input type='number' class='form-control' value='${paktur.kredit}'  name='nilaifaktur[]' readonly='true'></td>
                                        <td><input type='number' class='form-control' value='${paktur.kredit - (sisatotalpunyalo - sisaawalpunyalo)}' id='sisanilaiawal_${paktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${paktur.id_fj}' id='cb${paktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${paktur.id_fj}' id='jumlah_${paktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${paktur.kredit}' id='sisa_${paktur.id_fj}'  name='sisa[]' data-awal='${paktur.krebit - total}' readonly="true"></td>
                                    </tr>`;
                                            tbody.append(row);
                                        }
                                        if (paktur.debit != 0) {
                                            var sisatotalpunyalo = 0;
                                            var sisaawalpunyalo = 0;
                                            var total = 0;
                                            if (paktur.id_fj === detail.id_faktur) {
                                                var sisaawalpunyalo = detail
                                                    .nilai_faktur;
                                                var sisatotalpunyalo = detail
                                                    .sisa_pembayaran;
                                                var total = sisaawalpunyalo -
                                                    sisatotalpunyalo;
                                            }
                                            // console.log(sisaawalpunyalo);
                                            // console.log(sisatotalpunyalo);
                                            // console.log(total);
                                            const row = `
                                <tr>
                                    <td>${paktur.id_fj}</td>
                                        <td>${formatDate(paktur.tanggal_sj)}</td>
                                        <td>${formatDate(paktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>       
                                        <td><input type='number' class='form-control' value='${paktur.debit}'  name='nilaifaktur[]' readonly='true'></td>                                        
                                        <td><input type='number' class='form-control' value='${paktur.debit - total}' id='sisanilaiawal_${paktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${paktur.id_fj}' id='cb${paktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${paktur.id_fj}' id='jumlah_${paktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${paktur.debit - total}' id='sisa_${paktur.id_fj}'  name='sisa[]' data-awal='${paktur.debit - total}' readonly="true"></td>
                                </tr>`;
                                            tbody.append(row);
                                        }
                                        fakturFound = true;
                                    }
                                });
                            }
                        } else {
                            if (konsumenJenis === 'K') {
                                fakturList.forEach(faktur => {
                                    // console.log(noAkunValue + ' ' + noKonsumenValue + ' ' + faktur
                                        .no_subbukubesar + ' ' + faktur.kode_perusahaan);
                                    detailList.forEach(detail => {
                                        if (faktur.no_subbukubesar === noAkunValue && faktur
                                            .kode_perusahaan === noKonsumenValue) {
                                            const today = new Date();
                                            const jatuhTempo = new Date(faktur.jatuh_tempo);
                                            const differenceInDays = Math.floor((
                                                jatuhTempo -
                                                today) / (1000 * 60 * 60 * 24));

                                            if (faktur.kredit != 0) {
                                                var sisatotalpunyalo = 0;
                                                var sisaawalpunyalo = 0;
                                                var total = 0;
                                                const row = `
                                        <tr>
                                        <td>${faktur.id_fj}</td>
                                        <td>${formatDate(faktur.tanggal_sj)}</td>
                                        <td>${formatDate(faktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>                
                                        <td><input type='number' class='form-control' value='${faktur.kredit}'  name='nilaifaktur[]' readonly='true'></td>
                                        <td><input type='number' class='form-control' value='${faktur.kredit - (sisatotalpunyalo - sisaawalpunyalo)}' id='sisanilaiawal_${faktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${faktur.id_fj}' id='cb${faktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${faktur.id_fj}' id='jumlah_${faktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${faktur.kredit}' id='sisa_${faktur.id_fj}'  name='sisa[]' data-awal='${faktur.kredit - total}' readonly="true"></td>
                                    </tr>`;
                                                tbody.append(row);
                                            }
                                            if (faktur.debit != 0) {
                                                var sisatotalpunyalo = 0;
                                                var sisaawalpunyalo = 0;
                                                var total = 0;
                                                const row = `
                                <tr>
                                    <td>${faktur.id_fj}</td>
                                        <td>${formatDate(faktur.tanggal_sj)}</td>
                                        <td>${formatDate(faktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>       
                                        <td><input type='number' class='form-control' value='${faktur.debit}'  name='nilaifaktur[]' readonly='true'></td>                                        
                                        <td><input type='number' class='form-control' value='${faktur.debit - total}' id='sisanilaiawal_${faktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${faktur.id_fj}' id='cb${faktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${faktur.id_fj}' id='jumlah_${faktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${faktur.debit - total}' id='sisa_${faktur.id_fj}'  name='sisa[]' data-awal='${faktur.debit - total}' readonly="true"></td>
                                </tr>`;
                                                tbody.append(row);
                                            }
                                            fakturFound = true;
                                        }
                                    });
                                });
                            }
                            if (konsumenJenis === 'S') {
                                pakturList.forEach(paktur => {
                                    detailList.forEach(detail => {
                                        if (paktur.no_subbukubesar === noAkunValue && paktur
                                            .kode_perusahaan === noKonsumenValue) {
                                            const today = new Date();
                                            const jatuhTempo = new Date(paktur.jatuh_tempo);
                                            const differenceInDays = Math.floor((
                                                jatuhTempo -
                                                today) / (1000 * 60 * 60 * 24));

                                            if (paktur.kredit != 0) {
                                                var sisatotalpunyalo = 0;
                                                var sisaawalpunyalo = 0;
                                                var total = 0;
                                                const row = `
                                        <tr>
                                        <td>${paktur.id_fj}</td>
                                        <td>${formatDate(paktur.tanggal_sj)}</td>
                                        <td>${formatDate(paktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>                
                                        <td><input type='number' class='form-control' value='${paktur.kredit}'  name='nilaifaktur[]' readonly='true'></td>
                                        <td><input type='number' class='form-control' value='${paktur.kredit - (sisatotalpunyalo - sisaawalpunyalo)}' id='sisanilaiawal_${paktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${paktur.id_fj}' id='cb${paktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${paktur.id_fj}' id='jumlah_${paktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${paktur.kredit}' id='sisa_${paktur.id_fj}'  name='sisa[]' data-awal='${paktur.krebit - total}' readonly="true"></td>
                                    </tr>`;
                                                tbody.append(row);
                                            }
                                            if (paktur.debit != 0) {
                                                var sisatotalpunyalo = 0;
                                                var sisaawalpunyalo = 0;
                                                var total = 0;
                                                const row = `
                                <tr>
                                    <td>${paktur.id_fj}</td>
                                        <td>${formatDate(paktur.tanggal_sj)}</td>
                                        <td>${formatDate(paktur.jatuh_tempo)}</td>
                                        <td>${differenceInDays}</td>       
                                        <td><input type='number' class='form-control' value='${paktur.debit}'  name='nilaifaktur[]' readonly='true'></td>                                        
                                        <td><input type='number' class='form-control' value='${paktur.debit - total}' id='sisanilaiawal_${paktur.id_fj}' name='sisanilaiawal[]' readonly='true'></td>
                                        <td><input type='checkbox' class='form-control' value='${paktur.id_fj}' id='cb${paktur.id_fj}' name='cb[]'></td>
                                        <td><input type='number' class='form-control' value='${paktur.id_fj}' id='jumlah_${paktur.id_fj}' name='jumlahnilai[]' disabled = 'true'></td>
                                        <td><input type='number' class='form-control' value='${paktur.debit - total}' id='sisa_${paktur.id_fj}'  name='sisa[]' data-awal='${paktur.debit - total}' readonly="true"></td>
                                </tr>`;
                                                tbody.append(row);
                                            }
                                            fakturFound = true;
                                        }
                                    });
                                });
                            }
                        }
                        if (!fakturFound) {
                            tbody.html(
                                "<tr><td colspan='10'>Faktur dengan nomor yang diinputkan tidak ditemukan.</td></tr>"
                            );
                        }
                    } else {
                        alert("Input No Akun tidak boleh kosong!");
                    }
                }

                function formatDate(dateString) {
                    const date = new Date(dateString);
                    if (isNaN(date.getTime())) {
                        return "Invalid Date";
                    } else {
                        const day = String(date.getDate()).padStart(2, '0');
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const year = date.getFullYear();
                        return `${day}/${month}/${year}`;
                    }
                }

                populateModalTable(dataFakturJual.faktur, dataFakturBeli.paktur, dataDetailPembayaran
                    .detail);

                var saldoSebelumnya = {};

                // Event listener untuk checkbox


            });

            function resetAll() {
                // Reset nilai input
                var akun = document.getElementById('akunButton');
                $("input[id^='jumlah_']").each(function() {
                    var inputId = $(this).attr('id').split('_')[1];
                    var jumlahInput = $("#jumlah_" + inputId);
                    var sisaAwal = parseFloat($("#sisa_" + inputId).attr('data-awal'));
                    jumlahInput.val(sisaAwal);
                });

                // Reset saldo
                sessionStorage.setItem('saldo', 0);
                $("#saldo").text("Saldo: Rp.0");
                akun.disabled = true;
                konsumen.disabled = true;
                // Mengosongkan baris-baris di dalam tabel faktur
                $("#tabelFakturJual tbody").empty();
            }

            // Event listener for reset button
            $('#resetButton').on('click', function() {
                resetAll();
            });

            var saldoAwal = parseFloat(sessionStorage.getItem('saldo'));
            if (isNaN(saldoAwal)) {
                saldoAwal = 0;
            }
            // Tambahkan event listener untuk tombol reset
            // $('#resetButton').on('click', function() {
            //     resetAll();
            // });





            // Handling submit event of the modal
            $('#submitModalAkun').on('click', function() {
                const checkedCheckbox = $('.checkbox-input:checked');
                if (checkedCheckbox.length > 0) {
                    const noAkun = checkedCheckbox.attr('id');
                    const tampil = $('#akunhehe' + noAkun).val();
                    const nameAkun = checkedCheckbox.closest('tr').find('td:nth-child(3)').text().trim();
                    $('#no_akun').val(noAkun);
                    $('#name_akun').val(tampil);
                    $('#accountModal').modal('hide');
                    konsumen.disabled = false;
                } else {
                    $('#no_akun').val('');
                    $('#name_akun').val('');
                }
            });
        });
    </script>
    {{-- ajax --}}
    <script>
        $(document).ready(function() {
            // Mendapatkan nilai CSRF token dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#submitForm').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: "Apakah anda yakin menyelesaikan pembayaran tahap 1? ",
                    text: "Pastikan data yang dimasukkan benar, lalu jika anda membatalkan pada tahap 2, data tahap 1 akan dihapus dan Anda perlu memulai kembali dari awal.",
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var user_id = $('#user_id').val();
                        var id = $('#no_payment').val();
                        var paymentdate = $('#paymentdate').val();
                        var noAkuns = $('#no_akun').val();
                        var noKonsumens = $('#no_konsumen').val();
                        var checkboxes = $('input[name="cb[]"]:checked').map(function() {
                            return this.value;
                        }).get();

                        // Mengambil nilai dari input yang sesuai
                        var nilaiFaktur = $('input[name="nilaifaktur[]"]').map(function() {
                            return this.value;
                        }).get();

                        var sisaNilaiAwal = $('input[name="sisanilaiawal[]"]').map(function() {
                            return this.value;
                        }).get();

                        var jumlahNilai = $('input[name="jumlahnilai[]"]').map(function() {
                            return this.value;
                        }).get();

                        var sisa = $('input[name="sisa[]"]').map(function() {
                            return this.value;
                        }).get();

                        // Membuat objek data untuk request AJAX
                        var formData = {
                            _token: csrfToken, // Menambahkan CSRF token ke dalam data
                            id_bayar: id,
                            paymentdate: paymentdate,
                            no_akun: noAkuns,
                            no_konsumen: noKonsumens,
                            nilaifaktur: nilaiFaktur,
                            sisanilaiawal: sisaNilaiAwal,
                            cb: checkboxes,
                            jumlahnilai: jumlahNilai,
                            sisa: sisa

                        };

                        $.ajax({
                            url: '/pembayaran/' + user_id + '/' + id,
                            method: 'GET',
                            data: formData, // Menggunakan objek formData langsung
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Pembayaran tahap 1 berhasil, anda akan dibawa ke tahap 2'
                                }).then(() => {
                                    window.location.href = '/autojurnal/' +
                                        user_id + '/' + id;
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to submit form: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Search functionality
            $('#customerSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                const rows = $('#modalTableBodyCustomer tr');

                rows.each(function() {
                    const rowData = $(this).text().toLowerCase();
                    const rowVisible = rowData.includes(searchTerm);
                    $(this).toggle(rowVisible);
                });
            });

            // Single checkbox selection
            $('.checkboxCustomer-input').on('change', function() {
                if ($(this).prop('checked')) {
                    $('.checkboxCustomer-input').not(this).prop('checked', false);
                }
            });

            // Handling click event on table rows
            $('#modalTableBodyCustomer').on('click', 'tr', function() {
                const checkboxCustomer = $(this).find('.checkboxCustomer-input');
                checkboxCustomer.prop('checked', !checkboxCustomer.prop('checked'));
                $('.checkboxCustomer-input').not(checkboxCustomer).prop('checked', false);
            });

            // Handling submit event of the modal

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalTableBody = document.getElementById('modalTableBody');
            const submitModalBtn = document.getElementById('submitModal');
            const resetModalBtn = document.getElementById('resetModal');
            const notification = document.getElementById('notification');
            const form = document.querySelector('.form-horizontal');
            const saldo = sessionStorage.getItem('saldo');
            const namaPerusahaanSelect = document.getElementById('nama_perusahaan');
            const dataFakturJual = {!! json_encode(['faktur' => $faktur]) !!};


            function getSessionData() {
                return JSON.parse(sessionStorage.getItem('selectedItems')) || [];
            }

            function setSessionData(data) {
                sessionStorage.setItem('selectedItems', JSON.stringify(data));
            }

            submitModalBtn.addEventListener('click', function(event) {
                event.preventDefault();

                const selectedItems = [];
                const rows = modalTableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const id = row.querySelector('td:nth-child(1)').textContent;
                    const no_faktur = row.querySelector('td:nth-child(2)').textContent;
                    const tanggal = row.querySelector('td:nth-child(3)').dateContent;
                    const jatuh_tempo = row.querySelector('td:nth-child(4)').dateContent;
                    const hari = row.querySelector('td:nth-child(5)').textContent;
                    const nilaifaktur = row.querySelector('td:nth-child(6)').textContent;
                    const sisa_nilai_faktur = row.querySelector('td:nth-child(7)').textContent;
                    const jumlah_pembayaran = row.querySelector('td:nth-child(9)').textContent;
                    const sisa = row.querySelector('td:nth-child(10)').textContent;

                    const quantity = parseInt(quantityInput.value);
                    const price = parseInt(priceInput.value);
                    const discountpersen = parseInt(discountPersenInput.value);
                    const discount = parseInt(discountInput.value);
                    let total = 0;
                    if (quantity > 0) {
                        const a = quantity * price;
                        const b = a * (discountpersen / 100);
                        const c = quantity * discount;
                        let total = a - b - c;

                        if (total < 0) {
                            let total = 0;
                            alert('Pastikan lagi pada saat masukkan barang agar tidak minus.');
                        }
                        selectedItems.push({
                            id,
                            no_faktur,
                            tanggal,
                            jatuh_tempo,
                            hari,
                            nilaifaktur,
                            sisa_nilai_faktur,
                            jumlah_pembayaran,
                            sisa,
                        });
                    }
                });

                const existingData = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
                const existingDataMap = new Map(existingData.map(item => [item.id, item]));

                selectedItems.forEach(newItem => {
                    const existingItem = existingDataMap.get(newItem.id);
                    if (existingItem) {
                        existingItem.no_faktur = newItem.no_faktur;
                    } else {
                        existingDataMap.set(newItem.id, newItem);
                    }
                });

                const updatedData = Array.from(existingDataMap.values());
                sessionStorage.setItem('selectedItems', JSON.stringify(updatedData));

                if (selectedItems.length > 0) {
                    const resultElement = document.getElementById('result');
                    resultElement.innerHTML = '';

                    const table = document.getElementById('modalTableBody');

                    selectedItems.forEach(item => {
                        const row = table.insertRow();
                        row.innerHTML =
                            `<td>${item.nama_barang}</td><td>${item.quantity}</td><td>${item.price}</td><td>${item.discountpersen}%</td><td>${item.discount}</td><td>${item.total}</td>`;
                    });

                    resultElement.appendChild(table);
                }

                setSessionData(selectedItems);
                document.getElementById('selectedItemsInput').value = sessionStorage.getItem(
                    'selectedItems');
                $('#barangModal').modal('hide');
            });


            populateModalTable(dataFakturJual.barang);
            resetModalBtn.addEventListener('click', function(event) {
                // Clear the session storage
                sessionStorage.removeItem('saldo');

                // Optionally, you can clear any input values or other data on the page if needed
                const quantityInputs = document.querySelectorAll('.quantity-input');
                quantityInputs.forEach(input => {
                    input.value = ''; // Clear the input value
                });

                // You can add similar code to clear other inputs if needed
            });

        });
    </script>

    </div>
@endsection
