<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGIN | {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('coreui/dist/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="https://multipay.mdd.co.id/assets/images/logo/logo.png">
    <style type="text/css">
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
            font-family: Open Sans Condensed,Ubuntu Condensed,Ubuntu;
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
            <div class="col-md-8">
                <div class="card-group drop-shadow rounded-corner animated fadeIn">
                    <div class="card p-4 m-0">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                {{-- <img src="https://multidaya.id/wp-content/uploads/2018/12/new-logo-mdd.png" class="img-fluid mb-5"> --}}
                                @csrf
                                <small><h6 class="text-left"><span class="badge badge-danger"> DEVELOPMENT</span></h6></small>
                                <h1 class="text-left welcome">{{ __('Welcome') }}<small></small></h1>
                                <h4 class="text-left welcome">{{ __('Dashboard Switcher ISO 8583') }}</h4>
                                <p class="text-muted text-left sign">Sign In to your account</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                                        </svg></span>
                                    </div>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username">

                                    @error('username')
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
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-4" hidden>
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="{{ asset('coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                                        </svg></span>
                                    </div>
                                    <input class="form-control" type="text" name="status" placeholder="Password" value="1">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit" hidden>Sign In</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-info btn-sm px-4" type="submit">SIGN IN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white py-5 d-md-down-none" style="width:44%;background-color: #ebedef;">
                      <div class="card-body text-center d-flex flex-row align-items-center justify-content-center">
                        <div>
                            <img src="https://multipay.mdd.co.id/assets/images/logo/logo.png" class="img-fluid mb-3">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="form-group">
                                        <button class="btn btn-outline-light px-4" type="button" hidden>Monitoring</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('coreui/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('coreui/dist/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
</body>
</html>