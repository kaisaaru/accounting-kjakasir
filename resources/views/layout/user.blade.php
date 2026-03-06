<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KJA KASIR CA BKP</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/kjakasirlogo.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/typographyUser.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsiveUser.css') }}">
</head>

<body>

    @yield('modalEdit')
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
            <div class="loader">
                <div class="cube">
                    <div class="sides">
                        <div class="top">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="right">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="bottom">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="left">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="front">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="back">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->

    <div id="content-page" class="content-page">
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
    </div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">

            <div class="iq-navbar-custom">

                <div class="iq-sidebar-logo">

                    <div class="top-logo">

                        <a href="/homeUser" class="logo">
                            <img src="{{ asset('assets/images/kjakasirlogologin.png') }}" class="img-fluid rounded"
                                alt="">

                        </a>
                    </div>
                </div>
                <div class="navbar-breadcrumb">
                    <h5 class="mb-0">@yield('judul')</h5>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="@yield('link')">@yield('sub-judul')</a></li>
                        </ul>
                    </nav>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li class="nav-item dropdown">
                                <a href="#" class="search-toggle iq-waves-effect">
                                    <i class="ri-mail-line"></i>
                                    <span class="badge badge-pill badge-primary badge-up count-mail">3</span>
                                </a>
                                <div class="iq-sub-dropdown">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white">All Messages<small
                                                        class="badge  badge-light float-right pt-1">5</small></h5>
                                            </div>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded" src="images/user/01.jpg"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Nik Emma Watson</h6>
                                                        <small class="float-left font-size-12">13 Jun</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded" src="images/user/02.jpg"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                        <small class="float-left font-size-12">20 Apr</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded" src="images/user/03.jpg"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Why do we use it?</h6>
                                                        <small class="float-left font-size-12">30 Jun</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded" src="images/user/04.jpg"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Variations Passages</h6>
                                                        <small class="float-left font-size-12">12 Sep</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded" src="images/user/05.jpg"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                        <small class="float-left font-size-12">5 Dec</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="iq-waves-effect"><i class="ri-shopping-cart-2-line"></i></a>
                            </li>
                            <li class="nav-item">
                                @if (session('pb') == null && session('sj') == null)
                                    <a href="#" class="search-toggle iq-waves-effect">
                                        <i class="ri-notification-2-line"></i>
                                    </a>
                                    <div class="iq-sub-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0">
                                                <div class="bg-danger p-3">
                                                    <h5 class="mb-0 text-white">All Notifications<small
                                                            class="badge badge-light float-right pt-1">0</small></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (session('pb') != null || session('sj') != null)
                                    <a href="#" class="search-toggle iq-waves-effect">
                                        <i class="ri-notification-2-line"></i>
                                        <span class="bg-danger dots"></span>
                                    </a>
                                    <div class="iq-sub-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0">
                                                <div class="bg-danger p-3">
                                                    <h5 class="mb-0 text-white">All Notifications<small
                                                            class="badge badge-light float-right pt-1">{{ session('pb') && session('sj') ? 1 : 0 }}</small>
                                                    </h5>
                                                </div>
                                                <a href="/dataPB" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                            @if (session('pb') != null)
                                                                <h6 class="mb-0">New Order Received</h6>
                                                                @if (isset($timeDiff1))
                                                                    <small
                                                                        class="float-right font-size-12">{{ $timeDiff1 }}</small>
                                                                @endif
                                                                <p class="mb-0">Ada penerimaan barang baru, dan
                                                                    diperlukan aksi lebih lanjut</p>
                                                            @endif
                                                            @if (session('sj') != null)
                                                                <h6 class="mb-0">New Order Received</h6>
                                                                @if (isset($timeDiff2))
                                                                    <small
                                                                        class="float-right font-size-12">{{ $timeDiff2 }}</small>
                                                                @endif
                                                                <p class="mb-0">Ada Surat Jalan baru, dan diperlukan
                                                                    aksi lebih lanjut</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (session('pb') != null && session('sj') != null)
                                    <a href="#" class="search-toggle iq-waves-effect">
                                        <i class="ri-notification-2-line"></i>
                                        <span class="bg-danger dots"></span>
                                    </a>
                                    <div class="iq-sub-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0">
                                                <div class="bg-danger p-3">
                                                    <h5 class="mb-0 text-white">All Notifications<small>
                                                            class="badge badge-light float-right pt-1">{{ session('pb') && session('sj') ? 2 : (session('pb') || session('sj') ? 1 : 0) }}</small>
                                                    </h5>
                                                </div>
                                                <a href="/dataPB" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <div class="media-body ml-3">
                                                            @if (session('pb') != null)
                                                                <h6 class="mb-0">New Order Received</h6>
                                                                @if (isset($timeDiff1))
                                                                    <small
                                                                        class="float-right font-size-12">{{ $timeDiff1 }}</small>
                                                                @endif
                                                                <p class="mb-0">Ada penerimaan barang baru, dan
                                                                    diperlukan aksi lebih lanjut</p>
                                                            @endif
                                                            @if (session('sj') != null)
                                                                <h6 class="mb-0">New Order Received</h6>
                                                                @if (isset($timeDiff2))
                                                                    <small
                                                                        class="float-right font-size-12">{{ $timeDiff2 }}</small>
                                                                @endif
                                                                <p class="mb-0">Ada Surat Jalan baru, dan diperlukan
                                                                    aksi lebih lanjut</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>



                            <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect"
                                    id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="search-toggle iq-waves-effect">
                                    <i class="ion-gear-b"></i>
                                </a>
                                <div class="iq-sub-dropdown">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <a href="/setting" class="iq-sub-card iq-bg-primary-secondary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-secondary">
                                                        <i class="ri-lock-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Setting Aplikasi</h6>
                                                        <p class="mb-0 font-size-12">Atur sistem aplikasi disini
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="/profile" class="iq-sub-card iq-bg-primary-danger-hover">
                                                <div class="media align-items-center">
                                                    <div class="iq-card-icon iq-bg-danger">
                                                        <i class="las la-city"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Informasi Perusahaan</h6>
                                                        <p class="mb-0 font-size-12">Cek informasi perusahaan disini
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <ul class="navbar-list">
                        <li>
                            <a href="#" class="search-toggle">
                                <img src="{{ asset('assets/images/kjakasirlogo.png') }}" class="img-fluid rounded"
                                    alt="user" style="width: 50px; height: 50px; border: 1px solid #000;">
                            </a>

                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <div class="d-flex align-items-center">
                                                <h5 class="mb-0 text-white line-height">
                                                    @if (Auth::check())
                                                        <p>Welcome, {{ Auth::user()->username }}</p>
                                                        <p>{{ Auth::user()->name }}</p>
                                                        @if (Auth::user()->kode_perusahaan !== null)
                                                            @if (Auth::user()->perusahaan->nama_perusahaan !== null)
                                                                {{ Auth::user()->perusahaan->nama_perusahaan }}
                                                            @endif
                                                        @endif
                                                    @else
                                                        <p>You are not logged in.</p>
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                        <a href="profile.html" class="iq-sub-card iq-bg-primary-hover" hidden>
                                            <div class="media align-items-center">
                                                <div class=" iq-card-icon iq-bg-primary">
                                                    <i class="ri-file-user-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">My Profile</h6>
                                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="/profile" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="iq-card-icon iq-bg-primary">
                                                    <i class="las la-city"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Profil Perusahaan</h6>
                                                    <p class="mb-0 font-size-12">Cek profil perusahaan disini
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="/profile-edit" class="iq-sub-card iq-bg-primary-success-hover">
                                            <div class="media align-items-center">
                                                <div class=" iq-card-icon iq-bg-success">
                                                    <i class="ri-profile-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Edit Profil</h6>
                                                    <p class="mb-0 font-size-12">Edit profil perusahaan disini</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href=".bd-example-modal-lg haiya"
                                            class="iq-sub-card iq-bg-primary-secondary-hover"
                                            data-target=".bd-example-modal-lg" data-toggle="modal">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-secondary">
                                                    <i class="ri-lock-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Ubah password</h6>
                                                    <p class="mb-0 font-size-12">Ubah password akun disini</p>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="d-inline-block w-100 text-center p-3">
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button type="submit" class="iq-bg-danger iq-sign-btn"
                                                    role="button">
                                                    Sign out <i class="ri-login-box-line ml-2"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->
        @yield('dashboardUser')
        @yield('relasiUser')
        @yield('barangUser')
        @yield('barangmasukUser')
        @yield('barangkeluarUser')
        @yield('akunUser')
        @yield('subakunUser')
        @yield('settingUser')
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="bg-white iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">KJA Kasir</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @if (session('status'))
        <script>
            var pesan = {!! json_encode(session('status')) !!}; // Mengambil pesan dari sesi
            alert(pesan); // Menampilkan pesan dalam alert
        </script>
    @endif
    <script>
        function validatePassword() {
            var newPassword = $('#newPassword').val();
            var confirmPassword = $('#confirmPassword').val();

            if (newPassword !== confirmPassword) {
                $('#passwordError').text('Password baru dan konfirmasi tidak sama.');
                $('#submitButton').prop('disabled', true); // Disable the submit button
            } else {
                $('#passwordError').text('');
                $('#submitButton').prop('disabled', false); // Enable the submit button
            }
        }
    </script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth S../crollbar JavaScript -->
    <script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('assets/js/lottie.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
