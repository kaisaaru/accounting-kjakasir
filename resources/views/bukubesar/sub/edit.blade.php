@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-subbukuBesar')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /subukuBesar
@endsection
@section('sub-judul')
    Daftar Sub Buku Besar
@endsection
@section('aksi-judul')
    Edit
@endsection
@section('barang')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit Sub Buku Besar</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Kategori Baru</p>
                    <form class="form-horizontal" action="/subbukuBesar/update/{{ $SubBukuBesar->id }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Akun
                                Buku Besar:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="no_bukubesar" name="no_bukubesar" required disabled>
                                    <option selected="" value="{{ $SubBukuBesar->no_bukubesar }}">
                                        {{ $SubBukuBesar->no_bukubesar }} - {{ $ket }}
                                    </option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->no_bukubesar }}">{{ $item->no_bukubesar }} -
                                            {{ $item->ket }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">No. SubBuku
                                Besar:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_subbukubesar" name="no_subbukubesar"
                                    placeholder="Masukkan Nomor Buku Besar" value="{{ $SubBukuBesar->no_subbukubesar }}"
                                    readonly>
                                {{-- value="{{ $previousNoSubBukuBesar + 1 }}"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Keterangan :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ket" name="ket"
                                    placeholder="Masukkan Keterangan" value="{{ $SubBukuBesar->ket }}">
                            </div>
                        </div>
                        <p></p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initial state
            if ($('#french').prop('checked')) {
                $('#selectContainer').show();
            } else {
                $('#selectContainer').hide();
            }

            // Toggle visibility on checkbox change
            $('#french').change(function() {
                if ($(this).prop('checked')) {
                    $('#selectContainer').show();
                } else {
                    $('#selectContainer').hide();
                }
            });
        });
    </script>
@endsection
