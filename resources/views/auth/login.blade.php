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
		<link href="{{ asset('coreui/dist/css/style.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>

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
						<img src="https://i.ibb.co/bg27thf/unnamed-removebg-preview.png" alt="">
                        <h4>Selamat Datang</h4>
						<p class="text-white text-center sign">Masuk ke akun anda untuk mengelola aplikasi Kasirku</p>
					</div>
					<div class="form-group">
						<label for="">E-mail:</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" data-validation="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>
								{{ $message }}
							</strong>
                        </span>
                        @enderror
					</div>

					<div class="form-group password-login">
						
					</div>
					<button type="submit" class="button-login btn-login"></button>
                    
				</form>
			</div>
			
		</div>

		<div class="modal" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body text-center">
						<label class="text-black-50">Kami telah mengirimkan email aktivasi dashboard untuk mengatur password anda ke</label>
						<label class="text-black-50 email-customer"></label>
						<a href="#" target="blank" class="btn btn-info" id="btn_setup"><i class="fa fa-angle-right"></i> Setup Password</a>
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

		@error('modal-activate')
			<script>
				let url = window.location.href;
				let arr = url.split("/");
				let base_url = arr[0] + "//" + arr[2]

				show_modal("{{ $message }}");
				
				function show_modal(email) {
					let mail = '<b class="email-customer">'+email+'</b>';
					$('.email-customer').html(mail);
					$('#myModal').modal('show');
					$('#btn_setup').attr('href', base_url+'/setup-password/{{ base64_encode($message) }}');
				}
			</script>
		@enderror

		@error('email_success')
			<script>
				document.getElementById('email').value = "{{ $message }}";
				var password = `<label for="">Password:</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" data-validation="password">
					`;
					$('.btn-login').html('<i class="fa fa-sign-in px-1"></i> LOGIN');
					$('.password-login').html(password);
			</script>
		@enderror

		@error('value_email')
			<script>
				var password = `<label for="">Password:</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" data-validation="password">
					`;
					$('.btn-login').html('<i class="fa fa-sign-in px-1"></i> LOGIN');
					$('.password-login').html(password);
					document.getElementById('email').value = "{{ $message }}";

			</script>
		@enderror
	</body>
</html>