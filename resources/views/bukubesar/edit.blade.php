@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-bukuBesar')
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
    Tambah
@endsection
@section('barang')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit Buku Besar</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if (session('error'))
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-text">{!! session('error') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.querySelector('.alert'); // Change to .alert
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000); // 3000 milliseconds = 3 seconds
                        </script>
                    @endif
                    <p>Input Kategori Baru</p>
                    <form id="formUpdateBukuBesar" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Tipe :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tipe" name="tipe" required>
                                    @foreach ($tipe as $item)
                                        <option value="{{ $item->tipe }}">
                                            {{ $item->tipe }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">No. Buku Besar
                                :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_bukubesar" name="no_bukubesar"
                                    placeholder="Masukkan Nomor Buku Besar" value="{{ $BukuBesar->no_bukubesar }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Keterangan :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ket" name="ket"
                                    placeholder="Masukkan Keterangan" value="{{ $BukuBesar->ket }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="btnUpdateBukuBesar">Update</button>
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
            $('#btnUpdateBukuBesar').click(function() {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan mengupdate data buku besar!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/bukuBesar/update/{{ $BukuBesar->id }}",
                            type: "POST",
                            data: $("#formUpdateBukuBesar").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Data buku besar berhasil diupdate!',
                                }).then((value) => {
                                    // Lakukan sesuatu setelah berhasil diupdate, misalnya reload halaman atau tindakan lainnya
                                    window.location.href = '/bukuBesar'
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal mengupdate data buku besar: ' +
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
