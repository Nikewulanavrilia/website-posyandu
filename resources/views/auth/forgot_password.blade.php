<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-mini.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        canvas {
            border-radius: 10px;
        }

        .captcha {
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
    <section class="captcha">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card p-3 custom-rounded">
                        <div class="card-header bg-primary text-light text-center custom-rounded">Silahkan Anda
                            Melakukan <br> Konfirmasi Kode Captcha</div>
                        <div class="card-body">
                            <canvas id="captchaCanvas" width="170" height="50"></canvas>
                            <form id="captchaForm">
                                <div class="form-group mt-3">
                                    <label for="captcha_code">Confirm Captcha</label>
                                    <input type="text" class="form-control" id="captcha_code" name="captcha_code">
                                </div>
                                <div class="container d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary shadow-sm mr-3"
                                        onclick="validateCaptcha()">Confirm</button>
                                    <a href="{{ route('login') }}" class="btn btn-secondary">Cancel<a>
                                </div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var canvas = document.getElementById("captchaCanvas");
            var ctx = canvas.getContext("2d");

            function generateRandomString(length) {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;

                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }

                return result;
            }

            function drawCaptcha() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                ctx.fillStyle = '#fff';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                ctx.strokeStyle = '#000';
                for (var i = 0; i < 3; i++) {
                    ctx.beginPath();
                    ctx.moveTo(0, Math.random() * 50);
                    ctx.lineTo(canvas.width, Math.random() * 50);
                    ctx.stroke();
                }

                for (var i = 0; i < 1000; i++) {
                    ctx.beginPath();
                    ctx.arc(Math.random() * canvas.width, Math.random() * 50, 1, 0, 2 * Math.PI);
                    ctx.fillStyle = '#434343';
                    ctx.fill();
                }

                var captchaCode = generateRandomString(4);
                ctx.font = 'bold 45px Poppins';
                ctx.fillStyle = '#000';
                ctx.fillText(captchaCode, 35, 35);

                window.captchaCode = captchaCode;
            }

            drawCaptcha();

            window.validateCaptcha = function() {
                var userInput = document.getElementById("captcha_code").value.toLowerCase();

                if (userInput === window.captchaCode.toLowerCase()) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Captcha confirmation successfully!',
                        confirmButtonColor: '#3085d6',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('verifikasi-email') }}";
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Captcha confirmation failed!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            };
        });
    </script>
</body>

</html>