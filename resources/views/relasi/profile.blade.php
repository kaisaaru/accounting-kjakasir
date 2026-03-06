@extends('layout.admin')
@section('judul')
    Profil
@endsection
@section('link')
    /profile
@endsection
@section('sub-judul')
    Profil
@endsection
@section('aksi-judul')
    Profil Perusahaan
@endsection
@section('dashboard')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body profile-page p-0">
                            <div class="profile-header">
                                <div class="cover-container">
                                    <img src="{{ asset('assets/images/page-img/profile-bg.jpg') }}" alt="profile-bg"
                                        class="rounded img-fluid w-100">
                                    <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                        <li><a href="/app/user/edit"><i class="ri-pencil-line"></i></a></li>
                                        <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="profile-info p-4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="user-detail pl-5">
                                                <div class="d-flex flex-wrap align-items-center">
                                                    <div class="profile-img pr-4">
                                                        <img src="{{ asset('assets/images/kjakasirlogo.png') }}"
                                                            alt="profile-img" class="avatar-130 img-fluid" />
                                                    </div>
                                                    <div class="profile-detail d-flex align-items-center">
                                                        {{-- <h3>{{ Auth::user()->kode_perusahaan->nama_perusahaan }}</h3>
                                                        <p class="m-0 pl-3"> - {{ Auth::user()->kode_perusahaan->jenis }}</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <ul
                                                class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                                <li>
                                                    <a class="nav-link active" data-toggle="pill"
                                                        href="#profile-feed">feed</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="pill"
                                                        href="#profile-activity">Activity</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="pill"
                                                        href="#profile-friends">friends</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="pill"
                                                        href="#profile-profile">profile</a>
                                                </li>
                                            </ul>
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
@endsection
