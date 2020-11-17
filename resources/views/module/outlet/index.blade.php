@extends('layouts.app')

@section('content')
<div class="row mx-center">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header"><i class="fa fa-align-justify"></i> {{ ucwords(str_replace('-', ' ', request()->segment(count(request()->segments())))) }}</div>
			<div class="card-body">
                <form action="{{ route('toko.outlet.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Nama Outlet</label>
                        <input type="text" placeholder="Nama Outlet" name="outlet_name" class="form-control form-control-sm" value="{{ Auth::user()->outlet_name }}" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="">Telepon / No. Handphone</label>
                            <input type="text" placeholder="021xxx / 08xxx" name="contact" class="form-control form-control-sm numeric" value="{{ Auth::user()->contact }}" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="">NPWP <small class="text-red"> *optional</small></label>
                            <input type="text" placeholder="NPWP" name="npwp" value="{{ Auth::user()->npwp }}" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="">Group</label>
                            <select class="form-group select2 col-sm-12" required>
                                <option value="">SELECT GROUP</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="3" name="alamat" class="form-control" required>{{ Auth::user()->alamat }}</textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <button class="btn btn-info btn-flat btn-sm" type="submit" style="float: right"><i class="fas fa-edit"></i> Simpan</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
    </div>
    <div class="col-sm-4">
		<div class="card">
			<div class="card-body">
				<div class="form-group text-center">
                    <h5 class="text-wrap">
                        @if (Auth::user()->outlet_name != null)
                            {{ Auth::user()->outlet_name }}
                        @else
                            NAMA OUTLET
                        @endif
                    </h5>
                    <p>
                        <small>
                            @if (Auth::user()->alamat != null)
                            {{ Auth::user()->alamat }}
                        @else
                            alamat
                        @endif
                        </small><br>
                        <small>
                        @if (Auth::user()->contact != null)
                            Telepon: {{ Auth::user()->contact }} NPWP: {{ Auth::user()->npwp }}
                        @else
                            Telepon: xxx NPWP: xxx
                        @endif
                        </small><hr>
                    </p>
                </div>
			</div>
		</div>
    </div>
</div>

<div class="row mx-center">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header"><i class="fa fa-align-justify"></i> Footer</div>
			<div class="card-body">
                <form action="{{ route('toko.outlet.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Footer Struk <small class="text-red">Maksimal panjang 255 karakter</small></label>
                            <textarea name="footer" id="" cols="30" rows="3" name="alamat" class="form-control @error('length-character') is-invalid @enderror">{{ Auth::user()->footer }}</textarea>
                            @error('length-character')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <button class="btn btn-info btn-flat btn-sm" type="submit" style="float: right"><i class="fas fa-edit"></i> Simpan</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
    </div>
    <div class="col-sm-4">
		<div class="card">
			<div class="card-body">
				<div class="form-group text-center">
                    <h5 class="text-wrap">
                    <p>
                        <small>
                            {{ Auth::user()->footer }}
                        </small><hr>
                    </p>
                </div>
			</div>
		</div>
    </div>
</div>
@endsection
