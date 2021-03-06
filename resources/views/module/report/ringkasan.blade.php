@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12" style="margin-bottom: 20px">
        <div class="card card">
            <div class="card-body">
                <form>
                    <div class="row">
                      <div class="col-9 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                        <input type="text" class="form-control" name="reportdate">
                      </div>
                      @desktop
                      <div class="col-3">
                        <button type="button" class="btn btn-info btn-flat pull-right"><i class="fa fa-download"></i> Laporan</button>
                      </div>
                      @enddesktop
                    </div>
                  </form>
            </div>
        </div>
    </div>
    @desktop
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> {{ ucwords(str_replace('-', ' ', request()->segment(count(request()->segments())))) }}</div>
        <div class="card-body">
          <div class="card">
            <div class="card-header">Penjualan Periode {{ date('F', time())}} {{ date('Y', time())}}
              <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
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

    @mobile
    <script>window.location = "/";</script>
    @endmobile
</div>
@endsection
