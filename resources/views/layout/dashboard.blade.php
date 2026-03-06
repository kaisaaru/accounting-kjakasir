@extends('layout.admin')
@section('active-dashboard')
    active
@endsection
@section('judul')
    Dashboard
@endsection
@section('link')
    /home
@endsection
@section('sub-judul')
    Home
@endsection
@section('aksi-judul')
    Home

    <script>
        $(document).ready(function() {
            var eror = '{{ session('error') }}';
            if (eror) {
                alert(eror);
            }
        });
    </script>
@endsection
@section('dashboard')
{{-- <div id="content-page" class="content-page">
    <marquee behavior="scroll" direction="right">User A telah menambahkan data baru </marquee>
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <style>
                            .iq-card-pemeliharaan {
                                background: url('assets/images/user/pemeliharaan.png') center center/cover no-repeat;
                            }
                        </style>

                        <div
                            class="iq-card iq-card-pemeliharaan dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between border-0">
                                <div class="mb-0 font-size-32 text-dark"><i data-icon="~"
                                    class="icon"></i></div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">

                                </div>
                            </div>
                            <div class="iq-card-body">
                                <h3 class="bjir">Pemeliharaan</h3>
                                <p class="mb-0 bjir">Sebuah fitur yang memungkinkan anda untuk melakukan pemeliharaan barang, relasi perusahaan, buku besar, dll.</p>
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary float-right" id="d-29"
                                        data-toggle="dropdown">
                                        Pilih
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-eye-fill mr-2"></i>Purchase Order</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-delete-bin-6-fill mr-2"></i>Penerimaan Barang</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-pencil-fill mr-2"></i>Faktur Beli</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <style>
                            .iq-card-masuk {
                                background: url('assets/images/user/barangmasuk.png') center center/cover no-repeat;
                            }
                            .id-card-bg{
                                backgorund-color: #14006e;
                            }
                        </style>

                        <div
                            class="iq-card iq-card-masuk dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between border-0">
                                <div class="mb-0 font-size-32 text-dark"><i data-icon="2" class="icon"></i></div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">

                                </div>
                            </div>

                            <div class="iq-card-body id-card-bg">
                                <style>
                                    .bjir{
                                        color: #ffffff;
                                        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                                    }
                                </style>
                                <h3 class="bjir">Barang Masuk</h3>
                                <p class="mb-0 bjir">Sebuah fitur yang memungkinkan anda untuk membeli barang melalui
                                    beberapa aksi.</p>
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary float-right" id="d-29"
                                        data-toggle="dropdown">
                                        Pilih
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-eye-fill mr-2"></i>Purchase Order</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-delete-bin-6-fill mr-2"></i>Penerimaan Barang</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-pencil-fill mr-2"></i>Faktur Beli</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <style>
                            .iq-card-keluar {
                                background: url('assets/images/user/barangkeluar.png') center center/cover no-repeat;
                            }
                        </style>

                        <div
                            class="iq-card iq-card-keluar dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between border-0">
                                <div class="mb-0 font-size-32 text-dark"><i data-icon="1" class="icon"></i></div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">

                                </div>
                            </div>
                            <div class="iq-card-body">
                                <h3 class="bjir">Barang Keluar</h3>
                                <p class="mb-0 bjir">Sebuah fitur yang memungkinkan anda untuk menjual barang melalui
                                    beberapa aksi.</p>
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary float-right" id="d-29"
                                        data-toggle="dropdown">
                                        Pilih
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-eye-fill mr-2"></i>Purchase Order</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-delete-bin-6-fill mr-2"></i>Penerimaan Barang</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-pencil-fill mr-2"></i>Faktur Beli</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <style>
                            .iq-card-laporan {
                                background: url('assets/images/user/laporan.png') center center/cover no-repeat;
                            }
                        </style>

                        <div
                            class="iq-card iq-card-laporan dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between border-0">
                                <div class="mb-0 font-size-32 text-dark"><i data-icon="(" class="icon"></i></div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">

                                </div>
                            </div>
                            <div class="iq-card-body">
                                <h3 class="bjir">Laporan</h3>
                                <p class="mb-0 bjir">Sebuah fitur yang memungkinkan anda untuk membuat laporan seperti: laporan neraca, laporan laba rugi, dll.</p>
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary float-right" id="d-29"
                                        data-toggle="dropdown">
                                        Pilih
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-eye-fill mr-2"></i>Purchase Order</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-delete-bin-6-fill mr-2"></i>Penerimaan Barang</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-pencil-fill mr-2"></i>Faktur Beli</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
