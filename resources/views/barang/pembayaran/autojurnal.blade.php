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
    <style>
        /*lebar agar total 100% */
        /* .scrollable-table-container {
                                                                                                                        width: auto;
                                                                                                                        height: 200px;
                                                                                                                        /* Atur tinggi sesuai kebutuhan Anda
                                                                                                                        overflow-x: scroll;
                                                                                                                        border: 1px solid #ccc;
                                                                                                                    } */
    </style>
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
                    <div class="tooltip" id="tooltip"></div>
                    <p id="saldo" for="tanggal_op" class="kekanan" style="display: inline-block;"></p>
                    <form class="form-horizontal" action="/pembayaran/t2" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_payment">No Payment :
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="no_payment" name="no_payment" placeholder=""
                                    value="{{ $id_bayar }}" readonly="true">
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
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_akun" name="name_akun" placeholder=""
                                    value="{{ $akuns->no_subbukubesar }} - {{ $akuns->ket }}" readonly>
                                <input type="hidden" class="form-control" id="no_akun" name="no_akun"
                                    value="{{ $akuns->no_subbukubesar }}" placeholder="" readonly>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="customer">Konsumen: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_customer" name="name_customer"
                                    value="{{ $perusahaans->kode_perusahaan }} - {{ $perusahaans->nama_perusahaan }}"
                                    placeholder="" readonly>
                                <input type="hidden" class="form-control" id="no_konsumen" name="no_konsumen"
                                    value="{{ $perusahaans->kode_perusahaan }}" placeholder="" readonly>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                // $('input.form-control').each(function() {
                                //     $('[data-toggle="tooltip"]').tooltip();
                                // });
                                $(function() {
                                    $('[data-toggle="tooltip"]').tooltip()
                                })
                            });
                        </script>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabelFakturJual">
                                <thead>
                                    <tr>
                                        <th>No. Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Ket</th>
                                        <th>MU</th>
                                        <th>Kurs</th>
                                        <th>Jumlah (MU)</th>
                                        <th>Akun Pembantu</th>
                                    </tr>
                                </thead>
                                <tbody id="modalTableBodyFaktur">
                                    @foreach ($fakturs as $item)
                                        @foreach ($detailbayars as $bayar)
                                            {{-- debet --}}
                                            <tr>
                                                <td>{{ $item->id_fj }}{{ $item->id_fb }}</td>
                                                <td><input type='text' class='form-control '
                                                        value='{{ $autoakundebit->ket }}' data-toggle="tooltip"
                                                        data-placement="top" title="{{ $autoakundebit->ket }}"
                                                        type="button" name='' id='' readonly='true'>
                                                    <input type='hidden' class='form-control'
                                                        value='{{ $autoakundebit->no_subbukubesar }}' name='autoakun[]'
                                                        id='autoakun'readonly='true'>
                                                </td>
                                                <td><input type='number' class='form-control'
                                                        value='{{ $bayar->jumlah_pembayaran }}' data-toggle='tooltip'
                                                        data-placement='top' title='{{ $bayar->jumlah_pembayaran }}'
                                                        name='debet[]' readonly='true'></td>
                                                <td><input type='number' class='form-control' value='0'
                                                        name='kredit[]' readonly='true'></td>
                                                <td><input type='text' class='form-control'
                                                        value='{{ $id_bayar }} untuk faktur {{ $item->id_fj }}{{ $item->id_fb }}'
                                                        data-toggle='tooltip' data-placement='top'
                                                        title='{{ $id_bayar }} untuk faktur {{ $item->id_fj }}{{ $item->id_fb }}'
                                                        name='ket[]' readonly='true'></td>
                                                <td><input type='text' class='form-control' value='IDR'
                                                        name='mu[]' id='mu' readonly='true'
                                                        style='color: black;'></td>
                                                <td><input type='text' class='form-control' value='1.00'
                                                        id='kurs' name='kurs[]' readonly='true'></td>
                                                <td><input type='text' class='form-control'
                                                        value='{{ $bayar->jumlah_pembayaran }}' id=''
                                                        name='jumlah[]' id='jumlahdebet' data-toggle='tooltip'
                                                        data-placement='top' title='{{ $bayar->jumlah_pembayaran }}'
                                                        readonly></td>
                                                <td><input type='text' class='form-control' value='-'
                                                        id='akunpembantu' name='akunpembantu[]'>
                                                </td>

                                            </tr>
                                            {{-- kredit --}}
                                            <tr>
                                                <td>{{ $item->id_fj }}{{ $item->id_fb }}</td>
                                                <td><input type='text' class='form-control'
                                                        value='{{ $autoakunkredit->ket }}' data-toggle='tooltip'
                                                        data-placement='top' title='{{ $autoakunkredit->ket }}'
                                                        name='' id='autoakun'readonly='true'>
                                                    <input type='hidden' class='form-control'
                                                        value='{{ $autoakunkredit->no_subbukubesar }}' name='autoakun[]'
                                                        id='autoakun'readonly='true'>
                                                </td>
                                                <td><input type='number' class='form-control' value='0'
                                                        name='debet[]' readonly='true'></td>
                                                <td><input type='text' class='form-control'
                                                        value='({{ $bayar->jumlah_pembayaran }})' data-toggle='tooltip'
                                                        data-placement='top' title='({{ $bayar->jumlah_pembayaran }})'
                                                        name='' id='kredit'readonly='true'>
                                                    <input type='hidden' class='form-control'
                                                        value='-{{ $bayar->jumlah_pembayaran }}' name='kredit[]'
                                                        id='kredit'readonly='true'>
                                                </td>
                                                <td><input type='text' class='form-control'
                                                        value='{{ $id_bayar }} untuk faktur {{ $item->id_fj }}{{ $item->id_fb }}'
                                                        data-toggle='tooltip' data-placement='top'
                                                        title='{{ $id_bayar }} untuk faktur {{ $item->id_fj }}{{ $item->id_fb }}'
                                                        name='ket[]' id='ket'readonly='true'></td>
                                                <td><input type='text' class='form-control' value='IDR'
                                                        name='mu[]' id='mu' readonly='true'
                                                        style='color: black;'></td>
                                                <td><input type='text' class='form-control' value='1.00'
                                                        id='kurs' name='kurs[]' readonly='true'></td>
                                                <td><input type='text' class='form-control'
                                                        value='({{ $bayar->jumlah_pembayaran }})' data-toggle='tooltip'
                                                        data-placement='top' title='({{ $bayar->jumlah_pembayaran }})'
                                                        id='' name='' style='color: red;' readonly><input
                                                        type='hidden' value='-{{ $bayar->jumlah_pembayaran }}'
                                                        id='' name='jumlah[]' style='color: red;' readonly>
                                                </td>
                                                <td><input type='text' class='form-control'
                                                        value='{{ $perusahaans->kode_perusahaan }} - {{ $perusahaans->nama_perusahaan }}'
                                                        id='' name='' data-toggle='tooltip'
                                                        data-placement='top'
                                                        title='{{ $perusahaans->kode_perusahaan }} - {{ $perusahaans->nama_perusahaan }}'
                                                        readonly>
                                                    <input type='hidden' class='form-control'
                                                        value='{{ $perusahaans->kode_perusahaan }}' id='akunpembantu'
                                                        name='akunpembantu[]' readonly>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Output tooltip akan ditampilkan di sini -->

                        <div class="form-group">
                            <button type="submit" id ="SubmitAutoJurnal" class="btn btn-primary ">Selesai</button>
                            <button type="button" id ="BatalAutoJurnal" class="btn iq-bg-danger">Batal</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#SubmitAutoJurnal').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: "Apakah anda yakin menyelesaikan auto jurnal? ",
                    text: "Pastikan sudah memasukkan bukti pembayaran, silahkan batal jika anda salah memasukkan data",
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var user_id = <?php echo json_encode($id); ?>;
                        var id = <?php echo json_encode($id_bayar); ?>;
                        var csrfToken = <?php echo json_encode(csrf_token()); ?>;
                        var no_akun = $('#no_akun').val();
                        var no_konsumen = $('#no_konsumen').val();

                        var autoakun = $('input[name="autoakun[]"]').map(function() {
                            return this.value;
                        }).get();

                        var debet = $('input[name="debet[]"]').map(function() {
                            return this.value;
                        }).get();

                        var ket = $('input[name="ket[]"]').map(function() {
                            return this.value;
                        }).get();

                        var mu = $('input[name="mu[]"]').map(function() {
                            return this.value;
                        }).get();

                        var kurs = $('input[name="kurs[]"]').map(function() {
                            return this.value;
                        }).get();

                        var jumlah = $('input[name="jumlah[]"]').map(function() {
                            return this.value;
                        }).get();


                        var kredit = $('input[name="kredit[]"]').map(function() {
                            return this.value;
                        }).get();

                        var akunpembantu = $('input[name="akunpembantu[]"]').map(function() {
                            return this.value;
                        }).get();

                        // Membuat objek data untuk request AJAX
                        var formData = {
                            _token: csrfToken, // Menambahkan CSRF token ke dalam data
                            user_id: user_id,
                            no_akun: no_akun,
                            no_konsumen: no_konsumen,
                            id_bayar: id,
                            autoakun: autoakun,
                            kredit: kredit,
                            debet: debet,
                            ket: ket,
                            mu: mu,
                            kurs: kurs,
                            jumlah: jumlah,
                            akunpembantu: akunpembantu
                        };
                        // console.log(formData);
                        $.ajax({
                            url: '/autojurnal/' + user_id + '/' + id + '/set',
                            method: 'get', // Menggunakan metode POST karena Anda akan mengirimkan data ke backend
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Pembayaran berhasil, silahkan menunggu pengecekan'
                                }).then(() => {
                                    window.location.href = '/dataPayment';
                                    // href = '/dataPayment';
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
    </div>
@endsection
