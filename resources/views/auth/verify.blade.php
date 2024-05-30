<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-mini.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
    </style>
</head>
<body>
<section class="verifikasi">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifikasi Email Anda') }}</div>

                    <div class="card-body">
                        <form class="d-inline" id="verificationForm" method="POST" action="{{ route('periksa-email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus required>
                                @error('error')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Verifikasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message
        });
    }

    document.getElementById('verificationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var emailInput = document.getElementById('email').value;
        if (!emailInput) {
            showError('Email field is required.');
            return;
        }

        this.submit();
    });
</script>
</body>
</html>