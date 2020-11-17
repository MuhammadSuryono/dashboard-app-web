<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SETUP-PASSWORD | {{ config('app.name', 'Multidaya Dinamika') }}</title>
    <link href="{{ asset('coreui/dist/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="https://play-lh.googleusercontent.com/SCWi3XBQkkHA0LGgxxOTQqtX8_EiQhKiCpK34dW_kZ9EezvAfAjg67BWAUf7thvW7g=s180-rw">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <style type="text/css">

        input, textarea, select, button {
            font-family: "Muli-SemiBold";
        }

        .login-bg {
            position: relative!important;
            background-color: #ebedef!important;
            transition: opacity 0.15s linear;
        }
        .login-bg:after {
            opacity: 0.5!important;
            content: ""!important;
            background: url("{{ url('https://multipay.mdd.co.id/assets/images/clipart-circuit.png') }}")!important;
            background-repeat: no-repeat!important;
            background-size: cover!important;
            background-position: 50% 50%;
            /* opacity: 0.5!important; */
            top: -50%!important;
            left: 0!important;
            bottom: 0!important;
            right: 0!important;
            position: absolute!important;
            z-index: -1!important;
        }

        .welcome {
            font-family: "Muli-SemiBold";
            font-weight: 900;
            color: #3e515b!important;
        }

        .sign {
            font-family: Open Sans Condensed,Ubuntu Condensed,Ubuntu;
            font-weight: 600;
        }

        .drop-shadow {
            box-shadow: 0 0 10px rgba(0,0,0,.125);
            -moz-box-shadow: 0 0 10px rgba(0,0,0,.125);
            -o-box-shadow: 0 0 10px rgba(0,0,0,.125);
            -webkit-box-shadow: 0 0 10px rgba(0,0,0,.125);
        }

        .fadeIn {
            animation-name: fadeIn;
        }

        .animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }
    </style>
</head>
<body class="c-app flex-row align-items-center login-bg">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-group drop-shadow rounded-corner animated fadeIn">
                <div class="card p-4 m-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('setup_password.create') }}">
                             <img src="https://i.ibb.co/0Z96F9g/Whats-App-Image-2020-11-03-at-09-41-24-removebg-preview.png" class="img-fluid" style="height: 50px">
                            @csrf
                            <h4 class="text-left welcome">{{ __('Setup Your Password') }}</h4>
                            <p class="text-muted text-left sign">Setup password untuk digunakan login pada dashboard</p>
                            <div class="alert-success">
                                
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                                        </svg></span>
                                </div>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                                        </svg></span>
                                </div>
                                <input class="form-control @error('password_konfirmasi') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="Password Konfirmasi" required>

                                @error('password_konfirmasi')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-info btn-sm" type="button" id="btn_setup"><i class="fa fa-key"></i> Setup Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('coreui/login/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('coreui/login/js/jquery.form-validator.min.js') }}"></script>
<script src="{{ asset('coreui/login/js/main.js') }}"></script>
<script src="{{ asset('coreui/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('coreui/dist/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
<script src="https://kit.fontawesome.com/231b668aca.js" crossorigin="anonymous"></script>
<script>
    let alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                    'Setup password anda berhasil!, halaman akan otomatis redirect ke halaman dashboard'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                        '<span aria-hidden="true">&times;</span>'+
                                    '</button>'+
                                '</div>';

    $(document).on('click', '#btn_setup', function(){
        $('.form-control').removeClass('is-invalid');
		$('span.invalid-feedback').remove();
		var count = 0;
		if ($('#password').val() != '' && $('#password').val() != $('#password_confirmation').val()) {
			$('#password_confirmation').addClass('is-invalid');
			$('<span class="invalid-feedback" role="alert"><strong>Password confirmation not match...</strong></span>').insertAfter($('#password_confirmation'));
			$('#password_confirmation').focus();
			count++;
        }
        
        if (count <= 0) {
            $.ajax({
                method: "POST",
                url: "{{ route('setup_password.create') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    password_confirmation: $('#password_confirmation').val(),
                    email: "{{ $email }}",
                },
            })
            .done(function(result) {
                $('.alert-success').html(alert);
                $.ajax({
                    method: "POST",
                    url: "{{ route('login') }}",
                    async: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: result[0].email,
                        password: result[0].password,
                    },
                })
                window.location.href = "http://localhost:5000/";
            })
            .fail(function(result) {
                console.log(result);
            });
        }
    })
</script>
</body>
</html>