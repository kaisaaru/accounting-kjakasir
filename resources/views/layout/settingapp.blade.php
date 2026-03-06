@extends('layout.admin')
@section('active-pemeliharaan')
    active
@endsection
@section('active-barang')
    active
@endsection
@section('judul')
    Setting Aplikasi
@endsection
@section('link')
    /setting
@endsection
@section('sub-judul')
    Setting Aplikasi
@endsection
@section('aksi-judul')
    Setting
@endsection
@section('setting')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Setting Aplikasi</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="acc-privacy">
                                <div class="data-privacy">
                                    <h4 class="mb-2">Akun default (Auto Jurnal)</h4>
                                    <form class="form-horizontal" action="/setting/set/{{ auth()->user()->id }}"
                                        method="POST" id="settingForm">
                                        @csrf
                                        <div class="form-group row">
                                            @if ($debit === null)
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="debit" name="debit" required>
                                                        <option value="" selected disabled>Silahkan pilih akun debit
                                                        </option>
                                                        @foreach ($akuns as $items)
                                                            <option value="-" disabled>
                                                                <strong>{{ $items->no_bukubesar }} -
                                                                    {{ $items->ket }}</strong>
                                                            </option>
                                                            @foreach ($items->subBukuBesar as $akun)
                                                                <option value="{{ $akun->no_subbukubesar }}">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }} -
                                                                    {{ $akun->ket }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="debit" name="debit" required>
                                                        <option value="{{ $debit->no_subbukubesar }}" selected disabled>
                                                            {{ $debit->no_subbukubesar }} - {{ $debit->ket }}
                                                        </option>
                                                        @foreach ($akuns as $items)
                                                            <option value="-" disabled>
                                                                <strong>{{ $items->no_bukubesar }} -
                                                                    {{ $items->ket }}</strong>
                                                            </option>
                                                            @foreach ($items->subBukuBesar as $akun)
                                                                <option value="{{ $akun->no_subbukubesar }}">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }} -
                                                                    {{ $akun->ket }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            @if ($kredit === null)
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="kredit" name="kredit" required>
                                                        <option value="" selected disabled>Silahkan pilih akun kredit
                                                        </option>
                                                        @foreach ($akuns as $items)
                                                            <option value="-" disabled>
                                                                <strong>{{ $items->no_bukubesar }} -
                                                                    {{ $items->ket }}</strong>
                                                            </option>
                                                            @foreach ($items->subBukuBesar as $akun)
                                                                <option value="{{ $akun->no_subbukubesar }}">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }} -
                                                                    {{ $akun->ket }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="kredit" name="kredit" required>
                                                        <option value="{{ $kredit->no_subbukubesar }}" selected disabled>
                                                            {{ $kredit->no_subbukubesar }} - {{ $kredit->ket }}
                                                        </option>
                                                        @foreach ($akuns as $items)
                                                            <option value="-" disabled>
                                                                <strong>{{ $items->no_bukubesar }} -
                                                                    {{ $items->ket }}</strong>
                                                            </option>
                                                            @foreach ($items->subBukuBesar as $akun)
                                                                <option value="{{ $akun->no_subbukubesar }}">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }} -
                                                                    {{ $akun->ket }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                        </div>

                                    </form>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="submitAplikasi" class="btn btn-primary">Lanjut</button>
                                    <button type="reset" id ="resetAplikasi" class="btn iq-bg-danger">Reset</button>
                                </div>
                                {{-- <hr>
                      <div class="data-privacy">
                         <h4 class="mb-2">Activity Status</h4>
                         <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="activety" checked="">
                            <label class="custom-control-label privacy-status mb-2" for="activety">Show Activity Status</label>
                         </div>
                         <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                      </div>
                      <hr> --}}
                                {{-- <hr>
                      <div class="data-privacy">
                         <h4 class="mb-2"> Your Profile </h4>
                         <div class="custom-control custom-radio">
                            <input type="radio" id="public" name="customRadio1" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="public"> Public </label>
                         </div>
                         <div class="custom-control custom-radio">
                            <input type="radio" id="friend" name="customRadio1" class="custom-control-input">
                            <label class="custom-control-label" for="friend"> Friend </label>
                         </div>
                         <div class="custom-control custom-radio">
                            <input type="radio" id="spfriend" name="customRadio1" class="custom-control-input">
                            <label class="custom-control-label" for="spfriend"> Specific Friend </label>
                         </div>
                         <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="onlyme" name="customRadio1" class="custom-control-input">
                            <label class="custom-control-label" for="onlyme"> Only Me </label>
                         </div>
                         <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                      </div>
                      <hr> --}}
                                <div class="data-privacy">
                                    <h4 class="mb-2">Privacy Help</h4>
                                    <a href="#"><i class="ri-customer-service-2-line mr-2"></i>Support</a>
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
                $('#submitAplikasi').click(function(event) {
                    event.preventDefault();
                    var user_id = <?php echo json_encode(auth()->user()->id); ?>;
                    var akun_kredit = $('#kredit').val();
                    var akun_debit = $('#debit').val();

                    var formData = {
                        _token: csrfToken,
                        user_id: user_id,
                        akun_kredit: akun_kredit,
                        akun_debit: akun_debit,
                    };

                    var method = 'GET'; // Changed method to POST
                    var action = 'Setting akun';
                    var url = '/setting/set/' + user_id;

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
                                        text: 'Berhasil' +
                                            action + ' dengan id : ' +
                                            user_id // Added space before action
                                    });
                                    setTimeout(() => {
                                        location.reload();
                                    }, 2000);
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Gagal untuk set akun: ' +
                                            'terjadi kesalahan',
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
