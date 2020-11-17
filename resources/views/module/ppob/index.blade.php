@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card">
                <div class="card-body">
                    <h5>Daftar Produk PPOB</h5>
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
                            @if (Auth::user()->ppob_group_price == 'global' || Auth::user()->ppob_group_price == null)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Anda berada pada <strong>Group Price Global</strong>, Silahkan update Group Price anda untuk bisa mengatur harga penjualan produk anda
                                </div>
                            @endif
                                @if (Auth::user()->ppob_group_price != 'global')
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Anda berada pada <strong>Group Price {{ Auth::user()->ppob_group_price }}</strong>, Silahkan update Group Price anda untuk bisa mengatur harga penjualan produk anda
                                    </div>
                                @endif
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="no-export" width="5"><input type="checkbox" name=""></th>
                                        <th class="no-export" width="5">No</th>
                                        <th>Produk Name</th>
                                        <th>Kategori</th>
                                        <th>Amount</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @enddesktop
    </div>

    <div class="modal fade" id="editHargaAgent" role="dialog" data-backdrop="static" aria-labelledby="editHargaAgent" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <form class="modal-content" method="POST" action="{{ route('item.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="titleEditHargaAgent">Title Product</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="" class="font-weight-bold col-sm-12">Detail Produk</label>
                                    <hr>
                                    <table class="table table-sm table-condensed table-borderless text-left pure-table col-sm-12">
                                        <tr>
                                            <td>Nama Produk</td>
                                            <td>:</td>
                                            <td>Pulsa XL Axiata</td>
                                        </tr>
                                        <tr>
                                            <td>ID Produk</td>
                                            <td>:</td>
                                            <td>XL5</td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>:</td>
                                            <td>Pulsa</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td>:</td>
                                            <td>5000</td>
                                        </tr>
                                    </table>

                                    {{-- Manajemen Stok --}}
                                    <label class="font-weight-bold col-sm-12">Ubah Harga Penjualan Anda</label>
                                    <hr>
                                    <table class="table table-sm table-condensed table-borderless text-left pure-table col-sm-12">
                                        <tr>
                                            <td>Harga Dasar</td>
                                            <td>:</td>
                                            <td id="hargadasar" class="text-right">5.000.00  </td>
                                        </tr>

                                        <tr>
                                            <td>Margin</td>
                                            <td>:</td>
                                            <td id="margin" class="text-right">2.000.00 +</td>
                                        </tr>

                                        <tr>
                                            <td>Harga Jual</td>
                                            <td>:</td>
                                            <td><input type="text" id="hargajual" class="form-control form-control-sm text-right" value="7.000.00" /></td>
                                        </tr>
                                    </table>


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

@section('rowCallback', '1')

@if(\Illuminate\Support\Facades\Auth::user()->ppob_group_price == 'global')
@section('columns')
    {
        "data": "id",
        "render": function ( data, type, row, meta )
        {
            return '<center><input type="checkbox" name="strradio[]" value="' + data + '"></center>';
        }
    },
    { "data": null},
    {
        "data": null,
        "render": function( data, type, row, meta )
        {
            return data.product_name +' | '+data.product_id;
        }
    },
    { "data": "category" },
    {
        "data": "amount",
        "render": function( data, type, row, meta )
        {
            return 'Rp. '+formatMoney(data);
        }
    },
    {
        "data": null,
        "render": function( data, type, row, meta )
        {
            var table = '<table style="margin: 0px!important;" class="table table-sm table-condensed table-borderless text-left">';
            table += '<tr> <td><b>Harga Dasar : </b></td> <td class="text-right"> Rp. '+ formatMoney((data.rs_price + data.mdd_margin)) +'</td></tr>';
            table += '<tr> <td><b>Fee : </b></td> <td class="text-right"> Rp. '+ formatMoney(0) +'</td></tr>';
            table += '<tr> <td><b>Harga Jual : </b></td> <td class="text-right"> Rp. '+ formatMoney((data.rs_price + data.mdd_margin)) +'</td></tr>';
            return table;
        }
    },
    {
        "data": null,
        "render": function ( data, type, row, meta )
        {
            var button = '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white"><i class="fa fa-fw fa-edit"></i> Edit</button>' + '</center>';
            if ( {{ Auth::user()->ppob_group_price == 'global' }} ){
                console.log("TRUE");
                button = '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#editHargaAgent"><i class="fa fa-fw fa-edit"></i> Edit</button>' + '</center>';
            }

            return button;
        }
    },
@endsection
@endif

@if(\Illuminate\Support\Facades\Auth::user()->ppob_group_price != 'global')
@section('columns')
    {
    "data": "id",
    "render": function ( data, type, row, meta )
    {
    return '<center><input type="checkbox" name="strradio[]" value="' + data + '"></center>';
    }
    },
    { "data": null},
    {
    "data": null,
    "render": function( data, type, row, meta )
    {
        return data.product_id +' | '+data.product_names;
    }
    },
    { "data": "base_price" },
    {
    "data": "amount",
    "render": function( data, type, row, meta )
    {
        console.log("BASE");
        return 'Rp. '+formatMoney(data);
    }
    },
    {
    "data": null,
    "render": function( data, type, row, meta )
    {
        var table = '<table style="margin: 0px!important;" class="table table-sm table-condensed table-borderless text-left">';
        table += '<tr> <td><b>Harga Dasar : </b></td> <td class="text-right"> Rp. '+ formatMoney((data.base_price + data.product_margin)) +'</td></tr>';
        table += '<tr> <td><b>Fee : </b></td> <td class="text-right"> Rp. '+ formatMoney(0) +'</td></tr>';
        table += '<tr> <td><b>Harga Jual : </b></td> <td class="text-right"> Rp. '+ formatMoney((data.sell_price)) +'</td></tr>';
        return table;
        }
    },
    {
    "data": null,
    "render": function ( data, type, row, meta )
    {
{{--            var button = '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white"><i class="fa fa-fw fa-edit"></i> Edit</button>' + '</center>';--}}
{{--            if ( {{ Auth::user()->ppob_group_price == 'global' }} ){--}}
{{--            console.log("TRUE");--}}
        button = '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#editHargaAgent"><i class="fa fa-fw fa-edit"></i> Edit</button>' + '</center>';
{{--        }--}}

        return button;
    }
},
@endsection
@endif
