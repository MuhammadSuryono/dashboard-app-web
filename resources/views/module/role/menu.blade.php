@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header"><i class="fa fa-align-justify"></i> Set Menu {{ $role->name }}</div>
			<div class="card-body">
				<form method="POST" action="{{ route('role.menu.update', $id) }}">
					@csrf
					<div class="table-responsive">
						<table class="table table-striped table-bordered sticky-head pure-table">
							<thead>
								<tr>
									<th width="2%" class="no-export text-center">No</th>
									<th colspan="2" width="35%" class="text-center">Name</th>
									<th width="10%" class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($menus as $menu)
								<tr>
									<th class="text-center">{{ $loop->iteration }}</th>
									<td colspan="2" class="text-center">{{ $menu->name }}</td>
									<td class="text-center">
										<input type="checkbox" name="menu[{{ $menu->id }}]" {{ $menu->access($role->id) ? 'checked' : null }}>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2"><a href="{{ route('role') }}" class="btn btn-lg btn-danger btn-block"><i class="fa fa-fw fa-window-close"></i>&nbsp;&nbsp;Close</a></td>
									<td colspan="2"><button type="submit" class="btn btn-lg btn-primary btn-block"><i class="fa fa-fw fa-save"></i>&nbsp;&nbsp;Save</button></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
