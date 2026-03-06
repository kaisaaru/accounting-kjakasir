@extends('layout.admin')
@section('modal')
    <div class="modal fade bd-example-modal-lg haiya" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/changePassword" method="POST" id="changePasswordForm">
                    @csrf
                    <div class="modal-body">
                        <label class="control-label col-sm-5 align-self-left mb-0" for="email">Old Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                placeholder="Masukkan password lama" required>
                        </div>

                        <label class="control-label col-sm-5 align-self-left mb-0" for="email">New Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newPassword" name="newPassword"
                                placeholder="Masukkan password baru" required onchange="validatePassword()">
                        </div>

                        <label class="control-label col-sm-5 align-self-left mb-0" for="email">Confirm
                            Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                placeholder="Konfirmasi Password baru" required onchange="validatePassword()">
                            <span id="passwordError" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
