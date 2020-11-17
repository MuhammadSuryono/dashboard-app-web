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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Selamat Datang <strong class="font-weight-bold text-uppercase">{{ ucwords(Auth::user()->fullname) }}</strong>. Anda masuk sebagai {{ ucwords(Auth::user()->name) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="height: 200px">
                <div class="card-body">
                    <h5 class="font-weight-light">Jumlah Transaksi <small class="text-muted">Hari ini</small></h5><br>
                    <h4 class="font-weight-bold">{{ $jumlah_transaksi }}</h4>

                </div>
                <div class="card-footer">
                    <a href="{{ url('transaction') }}" class="link pull-right">Lihat selengkapnya <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="height: 200px">
                <div class="card-body">
                    <h5 class="font-weight-light">Penjualan Kotor <small class="text-muted">Hari ini</small></h5><br>
                    <h4 class="font-weight-bold">{{ 'Rp. '.$penjualan_kotor }}</h4>

                </div>
                <div class="card-footer">
                    <a href="{{ url('report/penjualan') }}" class="link pull-right">Lihat selengkapnya <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="height: 200px">
                <div class="card-body">
                    <h5 class="font-weight-light">Penjualan Bersih <small class="text-muted">Hari ini</small></h5><br>
                    <h4 class="font-weight-bold">{{ 'Rp. '.$penjualan_bersih }}</h4>

                </div>
                <div class="card-footer">
                    <a href="{{ url('report/penjualan') }}" class="link pull-right">Lihat selengkapnya <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        @desktop
        <div class="col-sm-12">
            <div class="card card">
                <div class="card-body">
                    <form>
                        <div class="row">
                          <div class="col-3 input-group">
                            <select name="month" id="month" class="form-control select2-pure">
                                <option value="{{ date('m', time()) }}">{{ date('F', time()) }}</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ date('F', strtotime('01.'.$i.'.2020')) }}</option>
                                @endfor
                            </select>
                          </div>
                          <div class="col-3 input-group">
                            <select name="year" id="year" class="form-control select2-pure">
                                <option value="{{ date('Y', time()) }}">{{ date('Y', time()) }}</option>
                                @for ($i = 2010; $i <= 2030; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                          </div>
                          <div class="col-3">
                            <button type="button" class="btn btn-info btn-sm btn-flat" id="chart_search"><i class="fa fa-search"></i> Cari</button>
                          </div>
                          @desktop
                          <div class="col-3">
                            <button type="button" class="btn btn-info btn-sm btn-flat pull-right"><i class="fa fa-download"></i> Laporan</button>
                          </div>
                          @enddesktop
                        </div>
                      </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> {{ ucwords(str_replace('-', ' ', request()->segment(count(request()->segments())))) }}</div>
                <div class="card-body">
                <div class="card">
                    <div class="card-header">Penjualan Periode {{ date('F', time())}} {{ date('Y', time())}}
                    <div class="card-header-actions"></div>
                    </div>
                    <div class="card-body">
                    <div class="c-chart-wrapper">
                        <canvas id="canvas-1" style="height: 300px"></canvas>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @enddesktop
    </div>
</div>
@endsection
