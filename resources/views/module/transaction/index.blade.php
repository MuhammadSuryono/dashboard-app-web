@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
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
								<th style="width: 150px">Transaction Time</th>
								<th>Items</th>
								<th>Info Transaksi</th>
							</tr>
						</thead>
					
					</table>
				</div>
			</div>
		</div>
	</div>
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
{ "data": "created_at" },
{ 
	"data": "item_detail",
	"render": function ( data, type, row, meta )
	{
		let js = JSON.parse(data.replace(/&quot;/g,'"'));
		var table = '<table style="margin: 0px!important;" class="table table-sm table-hover table-condensed table-borderless table-striped text-left">';
		js.forEach(element => {
		table += '<tr> <td>'+ element.product_name +' x '+ element.quantity +'</td> <td class="text-right">'+ element.quantity*element.item_price +'</td></tr>';
		});
		table += '</table>';
		return table;

	}
},
{ 
	"data": null,
	"render": function ( data, type, row, meta )
	{
		{{-- console.log(data); --}}
		{{-- console.log(data.length); --}}
		let js = JSON.parse(data.transaksi.replace(/&quot;/g, '"'));
		var table = '<table style="margin: 0px!important;" class="table table-sm table-hover table-condensed table-borderless table-striped text-left">';
		js.forEach(element => {
		table += '<tr> <td><b>Id Transaksi : </b></td> <td class="text-right">'+ element.trx_id +'</td></tr>';
		table += '<tr> <td><b>Payment Metode : </b></td> <td class="text-right">'+ element.payment_metode +'</td></tr>';
		table += '<tr> <td><b>Created At : </b></td> <td class="text-right">'+ element.created_at +'</td></tr>';
		table += '<tr> <td><b>Status : </b></td> <td class="text-right">'+ element.dispense_status +'</td></tr>';
		table += '<tr> <td><b>Total Price : </b></td> <td class="text-right">'+ element.total_price +'</td></tr>';

		});
		table += '</table>';
		if (js.length > 0) {
			return table;
		}else{
			return '<h6><span class="badge badge-warning">'+data.status.toUpperCase()+'</span></h6>';
		}

	}
},
@endsection 

@section('datatables.start-button')
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
@endsection

