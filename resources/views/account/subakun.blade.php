@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-subakun')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /akun
@endsection
@section('sub-judul')
    Daftar Sub Akun
@endsection
@section('aksi-judul')
    Data
@endsection
@section('akun')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card-body">
                <div class="iq-header-title">
                    <h4 class="card-title">Daftar Sub Akun</h4>
                </div>
                <button type="button" class="btn btn-outline-primary mb-3">Tambah</button>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>lumine_kai</td>
                            <td>Kaisar</td>
                            <td>kaisarrayfa99@gmail.com</td>
                            <td>Perusahaan</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>lumine_kai</td>
                            <td>Kaisar</td>
                            <td>kaisarrayfa99@gmail.com</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
