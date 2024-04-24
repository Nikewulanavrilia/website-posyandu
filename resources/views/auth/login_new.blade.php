<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posyandu</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-mini.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('login/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('login/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('login/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('login/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('login/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('login/assets/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('login/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('login/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="container-fluid mt-5 align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card">
                            <div class="card-body">
                                <div class="app-brand justify-content-center d-flex">
                                    <a href="{{ route('login') }}" class="app-brand-link gap-2">
                                        <span class="app-brand-logo demo">
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo"
                                                width="150">
                                        </span>

                                    </a>
                                </div>
                                <!-- /Logo -->
                                <h4 class="mb-2 mt-3">Selamat Datang Di Posyandu</h4>
                                <p class="mb-4">Mohon login untuk melanjutkan</p>
                                <form id="formAuthentication" class="mb-3" action="/login" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your email" autofocus />
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                            <a href="{{ route('lupa-password') }}">
                                                <small class="text-primary">Lupa Password?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" />
                                            <label class="form-check-label" for="remember-me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @if ($errors->has('login_error'))
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: "{{ $errors->first('login_error') }}",
                                                    });
                                                });
                                            </script>
                                        @endif
                                        <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('login/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('login/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('login/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('login/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('login/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('login/assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.getElementById('formAuthentication').addEventListener('submit', function(event) {
            event.preventDefault();

            var username = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (!username.trim() && password.trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Email harus diisi',
                });
            } else if (username.trim() && !password.trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Password harus diisi',
                });
            } else if (!username.trim() && !password.trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Email dan Password harus diisi',
                });
            } else {
                this.submit();
            }
        });
    </script>
</body>

</html>