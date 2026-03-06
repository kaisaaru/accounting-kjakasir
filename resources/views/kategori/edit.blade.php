@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-kategori')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /tambahkategori
@endsection
@section('sub-judul')
    Daftar Kategori
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
                        <h4 class="card-title">Edit Kategori</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Edit Kategori</p>
                    <form id="formUpdateKategori" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Kategori
                                Barang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kategori_barang" name="kategori_barang"
                                    placeholder="Masukkan Kategori Barang" value="{{ $data->kategori_barang }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="btnUpdateKategori">Update</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#btnUpdateKategori").click(function() {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan mengupdate kategori barang!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/kategori-update/{{ $data->id }}",
                            type: "POST",
                            data: $("#formUpdateKategori").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Kategori barang berhasil diupdate!',
                                }).then((value) => {
                                    window.location.href = "/kategori"
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal mengupdate kategori barang: ' +
                                        error,
                                    icon: 'error'
                                });
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
