<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIGN-IN | {{ config('app.name', 'Laravel') }}</title>

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="{{ asset('coreui/login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('coreui/login/css/style.css') }}">
    <link rel="shortcut icon" type="image/ico" href="https://play-lh.googleusercontent.com/SCWi3XBQkkHA0LGgxxOTQqtX8_EiQhKiCpK34dW_kZ9EezvAfAjg67BWAUf7thvW7g=s180-rw">

</head>

<body>

<div class="wrapper">
    <div class="image-holder">
        {{-- <img src="images/registration-form-8.jpg" alt=""> --}}
    </div>
    <div class="form-inner drop-shadow">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-header">
                <h4>Selamat Datang</h4>
                <p class="text-muted text-left sign"></p>
                <div class="alert alert-login" id="alert-login">

                </div>
            </div>
            <div class="form-group">
                <label for="">E-mail:</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" data-validation="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group password-login">

            </div>
            <button type="submit">Login</button>

        </form>
    </div>

</div>

<script src="{{ asset('coreui/login/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('coreui/login/js/jquery.form-validator.min.js') }}"></script>
<script src="{{ asset('coreui/login/js/main.js') }}"></script>
</body>
</html>