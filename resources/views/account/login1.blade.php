<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | KJA KASIR CA BKP</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/kjakasirlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('/login/assets/css/styles.min.css') }}" />
</head>
<style>
    body {
        background-image: url("{{ asset('/login/bglogin.jpeg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>



<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-5">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="150"
                                        alt="">
                                </a>
                                <p class="text-center">KJA KASIR CA BKP</p>
                                <form id="login" action="/app/user/login" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Username</label>
                                        <input type="username" class="form-control" id="username" name="username"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Ingat Perangkat Ini?
                                            </label>
                                        </div>
                                        <a class="text-primary fw-bold" href=""> Lupa Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 fs-4 mb-4 rounded-2">Log
                                        In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Tidak punya akun?</p>
                                        <a class="text-primary fw-bold ms-2" href="/app/user/register">Buat
                                            akun baru</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/login/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
