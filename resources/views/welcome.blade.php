<form class="form-horizontal" action="/fakturjual/{{ $id_sj }}/create" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">ID Faktur Jual
                                (FJ)</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="id_fj" name="id_fj" placeholder=""
                                    value="{{ $FakturJualID }}" readonly="true">
                            </div>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="tanggal_fj" name="tanggal_fj"
                                    placeholder="Masukkan tanggal fj" value="{{ $tanggalHariIni }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#detailfb">Detail FJ</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">SJ (Surat
                                Jalan)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_sj" name="id_sj" placeholder=""
                                    readonly="true" value="{{ $id_sj }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang"> Ket :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ketsj" name="ketsj" placeholder=""
                                    readonly="true" value="Nomor SJ adalah {{ $id_sj }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="detailfb">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Faktur : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" id="btnTambahAkun">Tambah
                                                Akun</button>
                                            <button type="button" class="btn btn-primary" id="">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>