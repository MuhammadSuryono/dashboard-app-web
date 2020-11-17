@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12" style="margin-bottom: 20px">
        <div class="card card">
            <div class="card-body">
                <h5>Daftar Kategori
                <button type="button" class="btn btn-flat btn-info btn-sm pull-right" data-toggle="modal" data-target="#newCategoryModal"><i class="fa fa-plus"></i> Kategori</button></h5>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
								        <th class="no-export" width='5'><input type="checkbox" name="strradio[]"></th>
                                        <th class="no-export" width="5">No</th>
                                        <th>Kategori</th>
                                        <th>Item Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="list-kategori">

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
    <div class="col-sm-12">
        <div class="row data_category_mbl">

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

<div class="modal fade" id="newCategoryModal" role="dialog" data-backdrop="static" aria-labelledby="newCategoryModal" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
		<form class="modal-content" method="POST" action="{{ route('category.create') }}">
			@csrf
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="newCategoryModalLabel">Kategori Baru</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row justify-content-center">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<label for="label_detail_kategori" class="font-weight-bold col-sm-12 pull-right">Detail Kategori</label>
								<hr>
								<div class="form-group col-sm-12">
									<label for="">Nama Kategori</label>
									<input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Contoh: Minuman">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="close-create" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
				<button type="button" id="submit-create" onclick="checkCreate()" class="btn btn-primary btn-sm ladda-button" data-style="zoom-out" data-size="xs"><i class="fa fa-check"></i> Create</button>
			</div>
		</form>
	</div>
</div>
@endsection

@desktop
@section('foot-content')
<script type="text/javascript">
	
function table_category() {
	var data = getcategory();
    var row = '';
    var urut = 0;

    data.forEach(element => {
        urut = urut + 1;
        row += '<tr><td>'+urut+'</td><td>'+element.name+'</td><td></td><td></td></tr>';
    });
	
	$('#list-kategori').html(row);
}
// table_category();

</script>
@endsection
@enddesktop


@mobile
@section('foot-content')
<script type="text/javascript">
    function category_mobile() {
        var data = getcategory();
        var card = '';

        data.forEach(e => {
            card += '<div class="col-sm-4" style="margin-top: -20px">'+
            '<div class="card card">'+
                '<div class="card-body">'+
                    '<div class="row no-gutters">'+
                        '<div class="col-8">'+
                            '<h6 class="text-capitalize font-weight-bold text-keterangan-produk text-wrap">'+e.name+'</h6>'+
                        '</div>'+
                        '<div class="col-4">'+
                            '<div class="pull-right d-flex justify-content-between"><i class="fa fa-trash text-danger"></i><i class="fa fa-edit mx-2"></i></div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>';
        });

        $('.data_category_mbl').html(card);

    }
    category_mobile();
</script>
@endsection
@endmobile


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
    "data": "item_count",
    "className": "text-center"
},
{ 
	"data": null,
	"render": function ( data, type, row, meta )
	{
		return '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#editRoleModal" data-id="' + data.id + '" data-name="' + data.name + '" ><i class="fa fa-fw fa-edit"></i> Edit</button>' + '&NewLine;' + '<button type="button" class="btn btn-sm btn-danger text-white" data-id="' + data.id + '"><i class="fa fa-fw fa-trash"></i> Delete</button>' + '</center>';

	}
},
@endsection 

{{-- @section('datatables.start-button')
{
    extend: 'collection',
    text: 'Payment Methode',
    className: 'form-group btn btn-primary',
    buttons: [
	{
		text: '<i class="fa fa-fw fa-list-alt"></i>&nbsp;All',
		titleAttr: 'Success',
		action: function (e, dt, node, config)
		{
			location.reload();
			return false;
		}
	},
	@foreach ($payments as $item)
	{
		text: '<i class="fa fa-fw fa-list-alt"></i>&nbsp;{{$item->payment_metode}}',
		titleAttr: 'Success',
		action: function (e, dt, node, config)
		{
            table.columns(9).search('{{$item->payment_metode}}').draw();
		}
	},
	@endforeach
    ]
},
{
    extend: 'collection',
    text: 'Status',
    className: 'form-group btn btn-primary',
    buttons: [
	{
		text: '<i class="fa fa-fw fa-list-alt"></i>&nbsp;All',
		titleAttr: 'Success',
		action: function (e, dt, node, config)
		{
			location.reload();
			return false;
		}
	},
    {
        text: '<i class="fa fa-fw fa-check"></i>&nbsp;Success',
        titleAttr: 'Success',
        action: function ()
        {
            table.columns(10).search('SUCCESS').draw();
        }
	},
	{
        text: '<i class="fa fa-fw fa-ban"></i>&nbsp;Failed',
        titleAttr: 'Failed',
        action: function ()
        {
            table.columns(10).search('FAILED').draw();
        }
    },
    ]
},
@endsection --}}

