@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-relasi')
    active
@endsection
@section('judul')
    Pemeliharaan
@endsection
@section('link')
    /editrelasi/{id}
@endsection
@section('sub-judul')
    Daftar Relasi
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
                        <h4 class="card-title">Edit Relasi</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if (session('error'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{!! session('error') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        {{-- <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert'); // Change to .alert
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 5000); // 3000 milliseconds = 3 seconds
                    </script> --}}
                    @endif
                    <p>Input Relasi Baru</p>
                    <form class="form-horizontal" id="formUpdatePerusahaan" action="/relasi-update/{{ $data->id }}"
                        method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Nama
                                Perusahaan:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                    placeholder="Masukkan Nama Perusahaan" value="{{ $data->nama_perusahaan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Alamat
                                Kantor:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="2"
                                    placeholder="Masukkan Alamat Kantor">{{ $data->alamat_kantor }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Alamat
                                Gudang:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="2"
                                    placeholder="Masukkan Alamat Gudang">{{ $data->alamat_gudang }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Nama
                                Pimpinan:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                                    placeholder="Masukkan Pimpinan" value="{{ $data->nama_pimpinan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">No. Telepon:</label>
                            <div class="col-sm-10">
                                {{-- {{ dd($data->no_telepon) }} --}}
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                    placeholder="Masukkan Nomor Telepon" value="{{ $data->no_telepon }}">
                            </div>
                        </div>
                        @if ($data->jenis == 'Supplier')
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Plafon
                                    Debit:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="plafon_debit" name="plafon_debit"
                                        placeholder="Masukkan Plafon Debit" value="{{ $data->plafon_debit ?? 0 }}">
                                </div>
                            </div>
                        @elseif ($data->jenis == 'Konsumen')
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Plafon
                                    Kredit:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="plafon_kredit" name="plafon_kredit"
                                        placeholder="Masukkan Plafon Kredit" value="{{ $data->plafon_kredit ?? 0 }}">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="btnUpdatePerusahaan">Update</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#btnUpdatePerusahaan').click(function() {        
                Swal.fire({
                    title: "Do you want to save the changes?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $("#formUpdatePerusahaan").attr('action'),
                            type: "POST",
                            data: $("#formUpdatePerusahaan").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Perusahaan berhasil diperbarui!',
                                }).then((value) => {
                                   window.location.href = '/app/relasi' // Refresh halaman setelah berhasil memperbarui perusahaan
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal memperbarui perusahaan: ' +
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
