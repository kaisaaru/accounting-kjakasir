@extends('layout.admin')
@section('active-guide')
    active
@endsection
@section('active-panduan')
    active
@endsection
@section('judul')
    Guide
@endsection
@section('link')
    /app/guide
@endsection
@section('sub-judul')
    Panduan
@endsection
@section('aksi-judul')
    Panduan (Barang Keluar)
@endsection
@section('panduan')
    <style>
        .iq-card.anak {
            border: 1px solid #007bff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .iq-card.anak:hover {
            transform: translateY(-10px);
        }

        .hidden {
            display: none;
        }
    </style>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Panduan Aplikasi (Barang Keluar)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <p>Barang masuk merupakan sebuah fitur yang dapat membuat <strong>konsumen</strong> dapat
                                membeli barang di <strong>supplier</strong>, melakukan konfirmasi penerimaan barang, sampai
                                melihat detail pembelian. Didalam barang masuk ada beberapa fitur lagi yaitu
                                <strong>Purchase Order(PO), Penerimaan Barang, dan Faktur Beli</strong>. kami akan
                                menjelaskan masing masing fitur barang masuk
                            </p>
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between" id="po-title">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Order Penjualan (OP/SO)</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body hidden" id="po-body">
                                    <p><strong>Order Penjualan (OP/SO)</strong> merupakan fitur yang dapat membuat pengguna
                                        melakukan pembelian barang dari supplier.</p>
                                    <p>Oke, langsung saja ke cara penggunaan <strong>Order Penjualan (OP/SO)</strong>. Tetapi
                                        sebelum memulai purchase
                                        order, pastikan untuk mengisi relasi, kategori, kelompok, dan barang.</p>
                                    <ol>
                                        <li>Klik tombol tambah di halaman order penjualan.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/po1.gif') }}" alt=""
                                            width="55%">
                                        <li>Lalu pilih tanggal berapa anda akan melakukan pembelian.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/po1(2).gif') }}" alt=""
                                            width="55%">
                                        <li>Pilih supplier yang akan anda ingin beli barangnya.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/po2.gif') }}" alt=""
                                            width="55%">
                                        <li>Selanjutnya pilih tambah barang, di tambah barang anda bisa memilih barang yang
                                            ingin anda beli. Anda bisa memasukkan jumlah barangnya, harga barangnya, diskon
                                            (dalam bentuk persen), dan potongan harga. Anda juga bisa memilih barang lebih
                                            dari satu.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/po3.gif') }}" alt=""
                                            width="55%">
                                        <li>Selanjutnya plih jatuh tempo apabila belum ada atau tidak ada yang sesuai bisa
                                            ditambah jatuh tempo yang baru dengan cara mengetik berapa hari jatuh temponya.
                                            Sedikit catatan harap untuk tidak mengetik dan juga memilih jatuh tempo
                                            dikarenakan akan membuat error. Terakhir, anda klik tombol tambah untuk
                                            menyelesaikannya.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/po4.gif') }}" alt=""
                                            width="55%">
                                    </ol>
                                </div>
                            </div>
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between" id="pb-title">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Surat Jalan (SJ)</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body hidden" id="pb-body">
                                    <p><strong>Surat Jalan (SJ)</strong>merupakan fitur untuk melanjutkan proses
                                        barang masuk setelah order penjualan, dan penerimaan barang juga termasuk penting
                                        agar user dapat melanjutkan ketahap barang masuk terakhir yaitu faktur beli.</p>
                                    <p>Oke, langsung saja ke cara penggunaan <strong>Surat Jalan (SJ)</strong>. Tetapi
                                        sebelum memulai memakai fitur penerimaan barang, harap dipastikan sudah membuat
                                        order penjualan</p>
                                    <ol>
                                        <li>Klik tombol tambah di halaman penerimaan barang.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (1).gif') }}" alt=""
                                            width="55%">
                                        <li>Lalu pilih tanggal berapa anda melakukan pembelian.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (4).gif') }}" alt=""
                                            width="55%">
                                        <li>Pilih order penjualan yang akan anda buat penerimaan barangnya.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (2).gif') }}" alt=""
                                            width="55%">
                                        <li>Selanjutnya klik tombol <strong>Update Quantity</strong> untuk melakukan
                                            pengecekan ulang/memperbaiki berapa barang yang diterima apakah sesuai atau
                                            tidak dengan ril nya</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (3).gif') }}" alt=""
                                            width="55%">
                                        <li>Lalu ketik surat jalan umumnya formatnya seperti ini <strong>SJ-0001</strong>
                                            dan terakhir masukkan ket misal kenapa user melakukan update quantity atau
                                            semacamnya.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (5).gif') }}" alt=""
                                            width="55%">
                                        <li>Setelah selesai user bisa mengapprove/setuju agar penerimaan barang bisa lanjut
                                            ketahap selanjutnya.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (7).gif') }}" alt=""
                                            width="55%">
                                        <li>Catatan: apabila user ingin membatalkan penerimaan barang bisa klik tombol batal
                                            setelah mengapprove</li>
                                        <img src="{{ asset('assets/images/barangmasuk/pb (8).gif') }}" alt=""
                                            width="55%">
                                    </ol>
                                </div>
                            </div>
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between" id="fb-title">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Faktur Beli (FB)</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body hidden" id="fb-body">
                                    <p><strong>Faktur Beli (FB)</strong> merupakan fitur tahap terakhir dari barang masuk di
                                        faktur beli user bisa mengatur agar dapat </p>
                                    <p>Oke, langsung saja ke cara penggunaan <strong>Faktur Beli (FB)</strong>. Tetapi
                                        sebelum memulai memakai fitur penerimaan barang, harap dipastikan sudah membuat
                                        penerimaan barang</p>
                                    <ol>
                                        <li>Klik tombol faktur di record/baris penerimaan barang yang ingin dibuat fakturnya
                                        </li>
                                        <img src="{{ asset('assets/images/barangmasuk/fb (1) 1.gif') }}" alt=""
                                            width="55%">
                                        <li>Lalu pilih tanggal berapa anda melakukan fakturnya.</li>
                                        <img src="{{ asset('assets/images/barangmasuk/fb (2).gif') }}" alt=""
                                            width="55%">
                                        <li>Selanjutnya pilih akun sub buku besar.</li>
                                        <div class="list-group">
                                            <div class="list-group-item list-group-item-danger">
                                                <strong>Catatan: </strong> Akun Faktur Beli untuk debit/debet nya adalah <strong>Penerimaan
                                                    Barang Dagang</strong> dan kreditnya adalah <strong>Kas
                                                    Operasional</strong>.
                                                <br>
                                                <strong>Contoh dibawah ini hanya sekedar cara memasang akunnya saja!</strong>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/barangmasuk/fb (1) 2.gif') }}" alt=""
                                            width="55%">
                                        <li>Setelah itu klik tambah maka faktur beli berhasil dibuat!</li>
                                        <img src="{{ asset('assets/images/barangmasuk/fb (3).gif') }}" alt=""
                                            width="55%">                                        
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var poTitle = document.getElementById("po-title");
            poTitle.addEventListener("click", function() {
                console.log('test');
                var poBody = document.getElementById("po-body");
                poBody.classList.toggle("hidden");
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            var pbTitle = document.getElementById("pb-title");
            pbTitle.addEventListener("click", function() {
                console.log('test');
                var pbBody = document.getElementById("pb-body");
                pbBody.classList.toggle("hidden");
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            var fbTitle = document.getElementById("fb-title");
            fbTitle.addEventListener("click", function() {
                console.log('test');
                var fbBody = document.getElementById("fb-body");
                fbBody.classList.toggle("hidden");
            });
        });
    </script>
@endsection
