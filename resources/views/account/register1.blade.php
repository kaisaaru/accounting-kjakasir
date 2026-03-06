<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | KJA KASIR CA BKP</title>
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
<style>
    .password-strength {
        width: 100px;
        height: 20px;
        border-radius: 10px;
        /* Mengurangi border-radius agar lebih proporsional */
        margin-top: 10px;
        /* Menambahkan sedikit ruang atas untuk lebih terpisah */
        text-align: center;
        line-height: 20px;
        font-weight: bold;
        /* Menambahkan ketebalan font untuk menonjolkan kekuatan kata sandi */
        color: white;
        /* Menetapkan warna teks menjadi putih agar lebih terlihat di latar belakang */
    }

    .password-strength.very-weak {
        background-color: #ff0015;
    }

    .password-strength.weak {
        background-color: #e04742;
    }

    .password-strength.medium {
        background-color: #e6ff02;
    }

    .password-strength.strong {
        background-color: #00df4a;
    }
</style>
<style>
    .password-strengthicon {
        margin-top: 10px;
    }

    .indicator-kanan {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ddd;
        text-align: right;
        margin-right: 10px;
        vertical-align: middle;
    }

    .indicator-kiri {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ddd;
        text-align: left;
        margin-right: 10px;
        vertical-align: middle;
    }


    .checked {
        background-color: #33cc33;
        color: white;
    }
</style>
<style>
    .password-strength {
        width: 100%;
        height: 20px;
        border-radius: 50px;
        background-color: #ddd;
        border: 1px;

        /* Rounded corners */
    }

    .progress-bar-very-weak {
        background-color: #ff0000;
        /* Red for weak */
    }

    .progress-bar-weak {
        background-color: #f7631f;
        /* Red for weak */
    }

    .progress-bar-medium {
        background-color: #ffcc00;
        /* Yellow for medium */
    }

    .progress-bar-strong {
        background-color: #33cc33;
        /* Green for strong */
    }
</style>

<style>
    .password-strengthicon {
        margin-top: 10px;
    }

    .indicator-kanan {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ddd;
        text-align: right;
        margin-right: 10px;
        vertical-align: middle;
    }

    .indicator-kiri {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ddd;
        text-align: left;
        margin-right: 10px;
        vertical-align: middle;
    }


    .checked {
        background-color: #33cc33;
        color: white;
    }
</style>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
                                <form id="register" action="/app/user/register" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" class="form-control mb-0" id="username" name="username"
                                            placeholder="Your Full">
                                        @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="exampleInputEmail1">Your Full Name</label>
                                        <input type="text" class="form-control mb-0" id="name" name="name"
                                            placeholder="Your Full Name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="exampleInputEmail2">Email address</label>
                                        <input type="email" class="form-control mb-0" id="email" name="email"
                                            placeholder="Enter email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control mb-0" id="password"
                                            placeholder="Password" name="password" oninput="validatePassword()">
                                        <div id="passwordStrengthicon" class="password-strengthicon">
                                            <span id="capitalIndicator" class="indicator-kiri"></span> Password terdiri
                                            dari 1
                                            huruf
                                            kapital<br>
                                            <span id="lengthIndicator" class="indicator-kanan"></span> Password lebih
                                            dari sama
                                            dengan 8
                                            karakter<br>
                                            <span id="numberIndicator" class="indicator-kiri"></span> Password terdiri
                                            dari 1
                                            angka<br>
                                            <span id="symbolIndicator" class="indicator-kanan"></span> Password terdiri
                                            dari 1
                                            simbol
                                        </div>
                                        <div class="progress mb-10 mt-2">
                                        <div class ="progress-bar" id="progressBar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>                                
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        {{-- <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Ingat Perangkat Ini?
                                            </label>
                                        </div> --}}
                                        <div id="passwordStrength" class="password-strength"></div>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 fs-4 mb-4 rounded-2">Daftar</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                                        <a class="text-primary fw-bold ms-2" href="/app/user/login">Login disini</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var passwordField = document.getElementById("password");
            var password = passwordField.value.replace(/\s/g, ''); // Remove spaces
            passwordField.value = password;
            var capitalIndicator = document.getElementById("capitalIndicator");
            var lengthIndicator = document.getElementById("lengthIndicator");
            var numberIndicator = document.getElementById("numberIndicator");
            var symbolIndicator = document.getElementById("symbolIndicator");
            var progressBar = document.getElementById('progressBar');
            var strength = 0;
            // Validate capital letters
            if (/[A-Z]/.test(password)) {
                capitalIndicator.classList.add("checked");
            } else {
                capitalIndicator.classList.remove("checked");
            }

            // Validate length
            if (password.length >= 8) {
                lengthIndicator.classList.add("checked");
            } else {
                lengthIndicator.classList.remove("checked");
            }

            // Validate presence of a number
            if (/[0-9]/.test(password)) {
                numberIndicator.classList.add("checked");
            } else {
                numberIndicator.classList.remove("checked");
            }

            // Validate presence of a symbol
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                symbolIndicator.classList.add("checked");
            } else {
                symbolIndicator.classList.remove("checked");
            }

            // Validate length
            if (password.length >= 8) {
                strength += 1;
            }

            // Validate presence of a number
            if (/[0-9]/.test(password)) {
                strength += 1;
            }

            // Validate presence of a symbol
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 1;
            }

            // Validate presence of an uppercase letter
            if (/[A-Z]/.test(password)) {
                strength += 1;
            }

            // Display strength indicator
            // console.log(progressBar);
            if (strength == 0) {
                progressBar.style.width = '0%';                
            } else if (strength == 1) {
                progressBar.style.width = '25%';              
                progressBar.classList.add('bg-danger');
            } else if (strength == 2) {
                progressBar.style.width = '50%';       
                progressBar.classList.remove('bg-danger');         
                progressBar.classList.add('bg-warning');
            } else if (strength == 3) {
                progressBar.style.width = '75%';
            } else {
                progressBar.style.width = '100%';    
                progressBar.classList.remove('bg-warning');               
                progressBar.classList.add('bg-success');
            }
        }
    </script>
    <script src="{{ asset('/login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/login/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
