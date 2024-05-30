<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-mini.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        canvas {
            border-radius: 10px;
        }

        .verifikasi {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1);
        }

        .custom-rounded {
            border-radius: 10px !important;
        }
        
        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="verifikasi">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Membuat Password Baru Anda') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('reset.password') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text btn btn-primary">
                                                <i class="fas fa-eye-slash" id="toggle-password" style="cursor: pointer;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text btn btn-primary">
                                                <i class="fas fa-eye-slash" id="toggle-password-confirmation" style="cursor: pointer;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        var icon = this;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });

    document.getElementById('toggle-password-confirmation').addEventListener('click', function () {
        var passwordInput = document.getElementById('password_confirmation');
        var icon = this;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });
    </script>
</body>

</html>