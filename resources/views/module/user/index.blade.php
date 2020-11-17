@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
            @if (Auth::user()->outlet_name == null || Auth::user()->contact == null || Auth::user()->alamat == null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Lengkapi data outlet anda untuk bisa melanjutkan proses penggunaan aplikasi POS atau klik disini <button class="btn btn-sm btn-warning"><i class="fas fa-angle-right"></i> Atur Outlet</button>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
					<form action="{{ route('setting.account.create') }}" method="POST">
						@csrf
						<h5 class="font-weight-light"><i class="fas fa-users"></i> Informasi Akun</h5><br><hr class="mt-0">
					
						<div class="form-group">
							<label for="">Nama Akun</label>
							<input type="text" class="form-control form-control-sm" name="name" value="{{ Auth::user()->name }}">
						</div>

						<div class="form-group">
							<label for="">Email Akun</label>
							<input type="text" class="form-control form-control-sm" value="{{ Auth::user()->email }}" disabled>
						</div>

						<div class="form-group">
							<label for="">Verifikasi Email</label>
							<input type="text" class="form-control form-control-sm" value="{{ Auth::user()->email_verified_at }}" disabled>
						</div>
						<div class="form-group">
							<button class="btn btn-info btn-flat btn-sm" type="submit" style="float: right"><i class="fas fa-edit"></i> Simpan</button>
						</div>
					</form>
                </div>
            </div>
		</div>
		
		<div class="col-md-6">
            <div class="card">
                <div class="card-body">
					<form action="#" method="POST">
						@csrf
						<h5 class="font-weight-light"><i class="fas fa-key"></i> Atur Password</h5><br><hr class="mt-0">
						<div class="form-group">
							<label for="">Password Baru</label>
							<input type="password" id="password" class="form-control form-control-sm" required>
						</div>

						<div class="form-group">
							<label for="">Komfirmasi Password</label>
							<input type="password" id="password_confirmation" class="form-control form-control-sm" required>
						</div>
						<div class="form-group">
							<button class="btn btn-info btn-flat btn-sm" type="button" id="btn_setup" style="float: right"><i class="fas fa-key"></i> Update</button>
					</form>
					</div>
                </div>
            </div>
		</div>
		
		<div class="col-md-12">
            <div class="card">
                <div class="card-body">
					<h5 class="font-weight-light"><i class="fas fa-shopping-cart"></i> Data Outlet</h5><br><hr class="mt-0">
					<div class="table-responsive">
						<table class="table table-striped table-bordered pure-table">
							<thead>
								<tr class="text-center">
									<th class="no-export text-center" width='5'>No.</th>
									<th>Nama Outlet</th>
									<th>Kontak</th>
									<th style="width: 150px">NPWP</th>
									<th>Alamat</th>									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>{{ Auth::user()->outlet_name }}</td>
									<td>{{ Auth::user()->contact }}</td>
									<td>{{ Auth::user()->npwp }}</td>
									<td>{{ Auth::user()->alamat }}</td>
								</tr>
							</tbody>
						
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot-content')
	<script>
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
                    email: "{{ Auth::user()->email }}",
                },
            })
            .done(function(result) {
                $.ajax({
                    method: "POST",
                    url: "{{ route('logout') }}",
                    async: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                })
            })
            .fail(function(result) {
                console.log(result);
            });
        }
    })
	</script>
@endsection
