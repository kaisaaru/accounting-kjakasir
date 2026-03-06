@extends('layout.admin')
@section('judul')
    Profil
@endsection
@section('link')
    /profile-edit
@endsection
@section('sub-judul')
    Akun
@endsection
@section('aksi-judul')
    Edit Profil Perusahaan
@endsection
@section('dashboard')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-body p-0">
                            <div class="iq-edit-list">
                                <ul class="iq-edit-profile d-flex nav nav-pills">
                                    <li class="col-md-6 p-0">
                                        <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                            Informasi Akun
                                        </a>
                                    </li>
                                    <li class="col-md-6 p-0">
                                        <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                            Informasi Perusahaan
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="iq-edit-list-data">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Edit Akun</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <!-- Edit Akun -->
                                        @if (Auth::check() && Auth::user()->id)
                                            <form action="/akun-update/{{ Auth::user()->id }}" method="post">
                                                @csrf
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <img class="profile-pic"
                                                                src="{{ asset('assets/images/kjakasirlogo.png') }}"
                                                                alt="profile-pic">
                                                            <div class="p-image">
                                                                <i class="ri-pencil-line upload-button"></i>
                                                                <input class="file-upload" type="file"
                                                                    accept="image/*" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-12" hidden>
                                                        <label for="fname">Username:</label>
                                                        <input type="text" class="form-control" id="id"
                                                            name="id" value="{{ Auth::user()->id }}"
                                                            data-old-value="{{ Auth::user()->id }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label for="fname">Username:</label>
                                                        <input type="text" class="form-control" id="username"
                                                            name="username" value="{{ Auth::user()->username }}"
                                                            data-old-value="{{ Auth::user()->username }}" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="uname">Name:</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ Auth::user()->name }}"
                                                            data-old-value="{{ Auth::user()->name }}">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">Email:</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ Auth::user()->email }}"
                                                            data-old-value="{{ Auth::user()->email }}" readonly>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2" id="akunpsf">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Reset</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Informasi Perusahaan</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <!-- Edit Perusahaan -->
                                        <form action="/perusahaan-update/{{ Auth::user()->perusahaan->id }}"
                                            method="post">
                                            @method('post') <!-- Tambahkan method spoofing untuk request POST -->
                                            @csrf
                                            <div class="row align-items-center">
                                                <div class="form-group col-sm-12">
                                                    <label for="kode_perusahaan">Kode Perusahaan:</label>
                                                    <input type="text" class="form-control" id="kode_perusahaan"
                                                        name="kode_perusahaan" value="{{ Auth::user()->kode_perusahaan }}"
                                                        readonly>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label for="nama_perusahaan">Nama Perusahaan:</label>
                                                    <input type="text" class="form-control" id="nama_perusahaan"
                                                        name="nama_perusahaan"
                                                        value="{{ old('nama_perusahaan', Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing') }}">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="jenis">Jenis:</label>
                                                    <input type="text" class="form-control" id="jenis"
                                                        name="jenis"
                                                        value="{{ Auth::user()->perusahaan->jenis ?? 'Kururing' }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="nama_pimpinan">Nama Pimpinan:</label>
                                                    <input type="text" class="form-control" id="nama_pimpinan"
                                                        name="nama_pimpinan"
                                                        value="{{ old('nama_pimpinan', Auth::user()->perusahaan->nama_pimpinan ?? 'Kururing') }}">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="alamat_kantor">Alamat Kantor:</label>
                                                    <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="5" style="line-height: 22px;">{{ old('alamat_kantor', Auth::user()->perusahaan->alamat_kantor ?? 'Kururing') }}</textarea>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="alamat_gudang">Alamat Gudang:</label>
                                                    <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="5" style="line-height: 22px;">{{ old('alamat_gudang', Auth::user()->perusahaan->alamat_gudang ?? 'Kururing') }}</textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2"
                                                id="informasipsf">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#akunpsf').click(function(event) {
                event.preventDefault();
                var id = $('#id').val();
                var username = $('#username').val();
                var name = $('#name').val();
                var email = $('#email').val();                

                var formData = {
                    _token: csrfToken,
                    id: id,
                    username: username,
                    name: name,
                    email: email // Removed comma here                    
                };

                var method = 'get'; // Changed method to POST
                var action = 'Purchase Order';
                var url = '/akun-update/{{ Auth::user()->id }}'; // Fixed Blade syntax                
                Swal.fire({
                    title: 'warning',
                    title: "Apakah anda yakin?",
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: method,
                            url: url,
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil update informasi akun!' // Fixed Blade syntax
                                }).then(() => {
                                    window.location.href =
                                        '/profile-edit'; // Update URL without reloading
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to update status: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#informasipsf').click(function(event) {
                event.preventDefault();
                var nama_perusahaan = $('#nama_perusahaan').val();
                var kode_perusahaan = $('#kode_perusahaan').val();
                var nama_pimpinan = $('#nama_pimpinan').val();
                var alamat_gudang = $('#alamat_gudang').val();
                var jenis = $('#jenis').val();
                var alamat_kantor = $('#alamat_kantor').val();

                var formData = {
                    _token: csrfToken,
                    kode_perusahaan: kode_perusahaan,
                    nama_perusahaan: nama_perusahaan,
                    jenis: jenis,
                    nama_pimpinan: nama_pimpinan,
                    alamat_kantor: alamat_kantor, // Added comma here
                    alamat_gudang: alamat_gudang // Removed comma here
                };

                var method = 'get'; // Changed method to POST
                var action = 'Purchase Order';
                var url = '/perusahaan-update/{{ Auth::user()->perusahaan->id }}'; // Fixed Blade syntax
                // console.log(url);
                Swal.fire({
                    title: 'warning',
                    title: "Apakah anda yakin?",
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: method,
                            url: url,
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil update informasi perusahaan!' // Fixed Blade syntax
                                }).then(() => {
                                    window.location.href =
                                        '/profile-edit'; // Update URL without reloading
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to update status: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
