<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/login/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('/login/assets/css/styles.min.css') }}" />
</head>
<style>
    body {
        background-color: skyblue;
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
                                @if (session('status') == 'verification-link-sent')
                                    <div class="alert alert-success">
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    <script>
                                        setTimeout(function() {
                                            var alert = document.querySelector('.alert-success'); // Change to .alert
                                            if (alert) {
                                                alert.style.display = 'none';
                                            }
                                        }, 10000); // 3000 milliseconds = 3 seconds
                                    </script>
                                @endif
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('/login/verify/email.png') }}" width="100" alt="">
                                </a>
                                <p class="text-center">KJA KASIR CA BKP</p>
                                <p style="text-align: center;"><strong style="font-size: 24px;">VERIFY YOUR
                                        EMAIL</strong></p>
                                <p class="card-text" style="text-align: center;">Mohon lakukan verifikasi email di bawah
                                    ini untuk melanjutkan. Jika mengalami kendala, silakan coba lagi. Apabila masalah
                                    masih berlanjut, jangan ragu untuk menghubungi tim pengembang aplikasi.</p>
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div style="display: flex; justify-content: space-between;">
                                        <button type="submit" class="btn btn-primary card-link">
                                            {{ __('Verifikasi Email') }}
                                        </button>
                                        <button type="submit" formaction="{{ route('logout') }}"
                                            class="btn btn-danger card-link">
                                            {{ __('Log Out') }}
                                        </button>
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
            var strengthBadge = document.getElementById("passwordStrength");
            var capitalIndicator = document.getElementById("capitalIndicator");
            var lengthIndicator = document.getElementById("lengthIndicator");
            var numberIndicator = document.getElementById("numberIndicator");
            var symbolIndicator = document.getElementById("symbolIndicator");
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
            switch (strength) {
                case 0:
                    strengthBadge.innerHTML = "";
                    strengthBadge.className = "";
                    break;
                case 1:
                    strengthBadge.innerHTML = "Very Weak";
                    strengthBadge.className = "password-strength very-weak";
                    break;
                case 2:
                    strengthBadge.innerHTML = "Weak";
                    strengthBadge.className = "password-strength weak";
                    break;
                case 3:
                    strengthBadge.innerHTML = "Medium";
                    strengthBadge.className = "password-strength medium";
                    break;
                case 4:
                    strengthBadge.innerHTML = "Strong";
                    strengthBadge.className = "password-strength strong";
                    break;

            }
        }
    </script>
    <script src="{{ asset('/login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/login/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
