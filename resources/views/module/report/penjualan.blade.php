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
        <div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr class="text-center">
								<th class="no-export" width='5'><input type="checkbox" name="strradio[]"></th>
								<th class="no-export text-center" width='5'>No.</th>
								<th style="width: 150px">Nama Produk</th>
								<th>Kategori</th>
                <th>Produk Terjual</th>
                <th>Total Penjualan Kotor</th>
							</tr>
						</thead>
					
					</table>
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

@section('rowCallback', '1')

@section('columns')
{ 	
	"data": "id",
	"render": function ( data, type, row, meta )
	{
		return '<center><input type="checkbox" name="strradio[]" value="' + data + '"></center>';
	} 
},
{ "data": null},
{ "data": "item_name" },
{ 
	"data": "category"
},
{ 
	"data": "total"
},
{ 
	"data": "total_penjualan"
},
@endsection 
