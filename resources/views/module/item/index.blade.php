@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card">
            <div class="card-body">
                <h5>Daftar Produk
                <button type="button" class="btn btn-flat btn-info btn-sm pull-right" data-toggle="modal" data-target="#newProduct"><i class="fa fa-plus"></i> Produk</button></h5>
            </div>
        </div>
    </div>
    @desktop
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header"><i class="fa fa-align-justify"></i> {{ ucwords(str_replace('-', ' ', request()->segment(count(request()->segments())))) }}</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
                            <table id="table-product" class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="no-export" width="5"><input type="checkbox" name=""></th>
                                        <th class="no-export" width="5">No</th>
                                        <th>Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga Jual</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="list-management-menu">

                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </div>
    @enddesktop
    @mobile
    <div class="col-sm-4">
        <div class="card card">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="https://www.wbcsd.org/var/site/storage/images/media/images/fresh_pa/80809-2-eng-GB/FRESH_PA_i1140.jpg" height="90px" width="100%"alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <h6 class="text-capitalize font-weight-bold text-keterangan-produk text-wrap">Nama Items</h6>
                        <p class="font-weight-light text-lowercase text-keterangan-produk d-inline-block text-wrap">Praeterea iter est quasdam res quas ex communi.</p>
                        <p class="font-weight-bold text-capitalize text-keterangan-produk d-inline-block text-wrap">Rp. 20.000,-</p>
                        <div class="pull-right d-flex justify-content-between"><i class="fa fa-trash text-danger"></i><i class="fa fa-edit mx-2"></i></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<hr/>
	<div class="col-sm-12">
		<!--Pagination red-->
		<nav class="pull-right">
			<ul class="pagination pg-red">

				<!--Numbers-->
				<li class="page-item"><a class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
				<li class="page-item"><a class="page-link"><i class="fa fa-angle-left"></i></a></li>
				<li class="page-item active"><a class="page-link">1</a></li>
				<li class="page-item"><a class="page-link">..</a></li>
				<li class="page-item"><a class="page-link">100</a></li>
				<li class="page-item"><a class="page-link"><i class="fa fa-angle-right"></i></a></li>
				<li class="page-item"><a class="page-link"><i class="fa fa-angle-double-right"></i></a></li>

			</ul>
		</nav>
		<!--/Pagination red-->
	</div>
    @endmobile
</div>

<div class="modal fade" id="newProduct" role="dialog" data-backdrop="static" aria-labelledby="newProduct" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
		<form class="modal-content" method="POST" action="{{ route('item.create') }}" enctype="multipart/form-data">
			@csrf
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="newProductLabel">Produk Baru</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row justify-content-center">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<label for="" class="font-weight-bold col-sm-12 pull-right">Detail Produk</label>
								<hr>
								<div class="form-group col-sm-12">
									<label for="">Nama Produk</label>
									<input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Contoh: Ayam Goreng" required>
								</div>
								<div class="form-group col-sm-12">
									<label for="">Harga Jual</label>
									<input type="text" name="sell_price" id="sell_price" class="form-control form-control-sm numerix" placeholder="Contoh: 5000" required>
								</div>

								<label for="" class="font-weight-bold col-sm-12 pull-right">Detail Tambahan</label>
								<hr>
								<div class="form-group col-sm-12">
									<label for="">Kategori</label>
									<select name="category_id" id="category_id" class="form-control select2-pure">
										<option value="">Pilih Kategori</option>
										@foreach ($category as $item)
											<option value="{{ $item->id }}">{{ $item->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-sm-12">
									<label for="">Harga Modal</label>
									<input type="text" name="init_price" id="init_price" class="form-control form-control-sm number" placeholder="Contoh: 5000" value="0">
								</div>

								{{-- Manajemen Stok --}}

								<label for="" class="font-weight-bold col-sm-12">Manajement Stock </label>
								<label for="" class="font-weight-light col-sm-12">Lacak penambahan dan pengurangan stok produk ini</label>
								<hr>
								<label for="" class="font-weight-bold col-sm-12 pull-right" id="info-stok">Stok saat ini: 0</label>

								<div class="form-group col-sm-12">
									<select name="category_id" class="form-control select2-pure" id="category_id">
										<option value="">Pilih Kondisi</option>
										<option value="">Tambahkan Stok</option>
										<option value="">Kurangkan Stok</option>
										<option value="">Hitung Ulang Stok</option>

									</select>
								</div>

								<div class="form-group col-sm-8">
									<label for="" id="header-stok">Jumlah Penambahan Stok</label>
									<input type="text" name="total_stock" id="total_stock" class="form-control form-control-sm numeric" placeholder="0">
								</div>

								<div class="form-group col-sm-12">
									<label for="">Stok Minimum</label>
									<input type="text" name="minimum_stock" id="minimum_stock" class="form-control form-control-sm number" placeholder="0">
								</div>

								<div class="form-group col-sm-12">
									<label for="">Deskripi (Opsional)</label>
									<textarea class="form-control form-control-sm" name="description" id="" rows="3"></textarea>
								</div>

								<div class="form-group col-sm-12">
									<label for="">Gambar Produk</label>
									<input type="file" name="image_product" class="form-control form-control-sm">
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="close-create" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
				<button type="submit" id="submit-create" class="btn btn-primary btn-sm ladda-button" data-style="zoom-out" data-size="xs"><i class="fa fa-check"></i> Create</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript">

function show_select_category() {
	var data = getcategory();
  	var opt = '<option value="">Pilih Kategori</option>';
  
  data.forEach(element => {
		opt += '<option value="'+element.id+'">'+element.name+'</option>';
	});

	$('#category').html(opt);
}

// show_select_category();

</script>
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
{ "data": "name" },
{ 
	"data": "category"
},
{ 
	"data": "sell_price",
	"render": function( data, type, row, meta )
	{
		return data;
	}
},
{ 
	"data": null,
	"render": function ( data, type, row, meta )
	{
		return '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#editRoleModal" data-id="' + data.id + '" data-name="' + data.name + '" ><i class="fa fa-fw fa-edit"></i> Edit</button>' + '&NewLine;' + '<button type="button" class="btn btn-sm btn-danger text-white" data-id="' + data.id + '"><i class="fa fa-fw fa-trash"></i> Delete</button>' + '</center>';

	}
},
@endsection 
