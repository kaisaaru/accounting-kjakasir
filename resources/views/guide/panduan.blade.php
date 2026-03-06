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
    Panduan
@endsection
@section('panduan')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h3 class="card-title">Panduan Aplikasi</h3>
                            </div>
                        </div>
                        <div class="iq-card-body">    
                            <p>Selamat datang diaplikasi akuntan <strong>KJA Kasir</strong>, disini ada beberapa panduan aplikasi yang dapat diikuti agar penggunaan aplikasi akuntan ini dapat lebih <strong>efektif</strong></p>                        
                            <p>Berikut adalah <strong>List Panduannya:</strong></p>
                            <div class="list-group">
                                <a href="/app/guide/pemeliharaan" class="list-group-item list-group-item-action list-group-item-primary">Pemeliharaan</a>
                                <a href="/app/guide/barangmasuk" class="list-group-item list-group-item-action list-group-item-primary">Barang Masuk</a>
                                <a href="/app/guide/barangkeluar" class="list-group-item list-group-item-action list-group-item-primary">Barang Keluar</a>                            
                                <a href="/app/guide/laporan" class="list-group-item list-group-item-action list-group-item-primary">Laporan</a>
                                <a href="/app/guide/jurnal" class="list-group-item list-group-item-action list-group-item-primary">Jurnal</a>
                                <a href="/app/guide/opname" class="list-group-item list-group-item-action list-group-item-primary">Opname</a>             
                                <a href="/app/guide/pembayaran" class="list-group-item list-group-item-action list-group-item-danger disabled">Pembayaran <strong>(Coming Soon)</strong></a>                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
