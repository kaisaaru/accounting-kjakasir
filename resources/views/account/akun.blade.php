@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection

@section('active-akun')
    active
@endsection

@section('judul')
    Pemeliharaan
@endsection

@section('link')
    /akun
@endsection

@section('sub-judul')
    Daftar Akun
@endsection

@section('aksi-judul')
    Data
@endsection

@section('akun')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card-body">
                <div class="iq-header-title">
                    <h4 class="card-title">Daftar Akun</h4>
                </div>
                <button class="btn btn-outline-primary mb-3 float-right" data-target="#exampleModalfilter"
                    data-toggle="modal">Filter</button>
                <button type="button" class="btn btn-outline-primary mb-3">Tambah</button>
                <div class="modal fade bd-example-modal-lg" id="exampleModalfilter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/akun/filter" method="get" id="filter">
                                @csrf
                                <div class="modal-body">
                                    @foreach ($kategori as $k)
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" name="filter[]"
                                                value="{{ $k }}" id="{{ $k }}">
                                            <label class="custom-control-label privacy-status mb-2"
                                                for="{{ $k }}">{{ $k }}</label>
                                        </div>
                                    @endforeach
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                @php
                    $no = 1;
                @endphp
                @foreach ($users as $row)
                    <tr>
                        <td><strong>{{ $no++ }}</strong></td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->kategori }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="d-flex justify-content-end">
            {!! $users->links() !!}
        </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
