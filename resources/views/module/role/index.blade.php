@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header"><i class="fa fa-align-justify"></i> {{ ucwords(str_replace('-', ' ', request()->segment(count(request()->segments())))) }}</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-center">
								<th class="no-export text-center" width="5"><input type="checkbox" name=""></th>
								<th class="no-export" width="5">No.</th>
								<th>Name</th>
								<th>Guard Name</th>
								<th class="no-export text-center">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form class="modal-content" method="POST" action="{{ route('role.update') }}">
			@csrf
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Role Name:</label>
					<input type="hidden" name="id" id="id">
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
				<div class="form-group">
					<label for="message-text" class="col-form-label">Guard Name:</label>
					<textarea class="form-control" id="desc" name="desc"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form class="modal-content" method="POST" action="{{ route('role.store') }}">
			@csrf
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="newRoleModalLabel">Create New Role</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Role Name:</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
				<div class="form-group">
					<label for="message-text" class="col-form-label">Guad Name:</label>
					<textarea class="form-control" id="desc" name="desc"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript">
	$('#editRoleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var name = button.data('name')
		var desc = button.data('desc')
		var modal = $(this)
		modal.find('.modal-title').text('Edit Role ' + name)
		modal.find('.modal-body input#id').val(id)
		modal.find('.modal-body input#name').val(name)
		modal.find('.modal-body textarea#desc').val(desc)
	})
</script>
@endsection

@section('rowCallback', '1')

@section('columns')
{
	"data": "rol_id",
	"render": function ( data, type, row, meta )
	{
		return '<center><input type="checkbox" name="strradio[]" value="' + data + '"></center>';
	}
},
{ "data": null },
{ "data": "name" },
{ "data": "guard_name" },
{
	"data": null,
	"render": function ( data, type, row, meta )
	{
		var m_url = "{{ route('role.edit', ':id') }}";
		m_url = m_url.replace(':id', data.rol_id);
		return '<center>' + '<button type="button" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#editRoleModal" data-id="' + data.rol_id + '" data-name="' + data.name + '" data-desc="' + data.guard_name + '"><i class="fa fa-fw fa-edit"></i> Edit</button>' + '&NewLine;' + '<a href="' + m_url + '" class="btn btn-sm btn-primary text-white"><i class="fa fa-fw fa-cog"></i> Set Menu</a>' + '</center>';
	}
},
@endsection

@section('datatables.start-button')
{
	text: '<i class="fa fa-users"></i>&nbsp;&nbsp;Tambah Role',
	titleAttr: 'Tambah Role Baru',
	attr:
	{
		id: 'role-add',
		'data-toogle': 'modal',
		'data-target': '#newRoleModal'
	},
	action: function ()
	{
		$('#newRoleModal').modal('show');
	},
	className: 'form-group btn btn-sm btn-success'
},
@endsection
