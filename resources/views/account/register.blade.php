<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KJA KASIR CA BKP</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/kjakasirlogo.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
            <div class="loader">
                <div class="cube">
                    <div class="sides">
                        <div class="top">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="right">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="bottom">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="left">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="front">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                        <div class="back">
                            <img src="{{ asset('assets/images/kjakasirlogo.png') }}" width="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- loader END -->
    <!-- Sign in Start -->
    <section class="sign-in-page bg-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 align-self-center">
                    <div class="sign-in-from">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <h1 class="mb-0">Sign Up</h1>
                        <p>Enter your email address and password to access admin panel.</p>
                        <form id="register" class="mt-4" action="/sign-up" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control mb-0" id="username" name="username"
                                    placeholder="Your Full">
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Your Full Name</label>
                                <input type="text" class="form-control mb-0" id="name" name="name"
                                    placeholder="Your Full Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail2">Email address</label>
                                <input type="email" class="form-control mb-0" id="email" name="email"
                                    placeholder="Enter email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control mb-0" id="password" placeholder="Password"
                                    name="password" oninput="validatePassword()">
                                <div id="passwordStrengthicon" class="password-strengthicon">
                                    <span id="capitalIndicator" class="indicator-kiri"></span> Password terdiri dari 1
                                    huruf
                                    kapital<br>
                                    <span id="lengthIndicator" class="indicator-kanan"></span> Password lebih dari sama
                                    dengan 8
                                    karakter<br>
                                    <span id="numberIndicator" class="indicator-kiri"></span> Password terdiri dari 1
                                    angka<br>
                                    <span id="symbolIndicator" class="indicator-kanan"></span> Password terdiri dari 1
                                    simbol
                                </div>
                                <div id="passwordStrength" class="password-strength"></div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="d-inline-block w-100">
                                <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                            </div>

                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a
                                        href="/">Log In</a></span>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="sign-in-detail text-white"
                        style="background: url({{ asset('assets/images/login/2.jpg') }}) no-repeat 0 0; background-size: cover;">
                        <a class="sign-in-logo mb-5" href="#"><img
                                src="{{ asset('assets/images/logo-white.png') }}" class="img-fluid"
                                alt="logo"></a>
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false"
                            data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1"
                            data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="{{ asset('assets/images/login/1.png') }}" class="img-fluid mb-4"
                                    alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                            <div class="item">
                                <img src="{{ asset('assets/images/login/1.png') }}" class="img-fluid mb-4"
                                    alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                            <div class="item">
                                <img src="{{ asset('assets/images/login/1.png') }}" class="img-fluid mb-4"
                                    alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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




    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
