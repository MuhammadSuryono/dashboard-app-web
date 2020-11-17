@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header"><i class="fa fa-align-justify"></i> Set Menu {{ $role->rol_name }}</div>
			<div class="card-body">
				<form method="POST" action="{{ route('role.menu.update', $id) }}">
					@csrf
					<div class="table-responsive">
						<table class="table table-striped table-bordered sticky-head pure-table">
							<thead>
								<tr>
									<th width="10%" class="no-export text-center">#</th>
									<th colspan="2" class="text-center">Name</th>
									<th width="10%" class="no-export text-center">
										<input type="checkbox">
									</th>
								</tr>
								<tr>
									<th width="10%" class="no-export text-center">No</th>
									<th width="35%" class="text-center">Group</th>
									<th width="35%" class="text-center">Name</th>
									<th width="10%" class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								@php $i = 1 @endphp
								@foreach($menus as $key => $menu)
								@php $row = count($menu->sub_menu()) @endphp
								@if($row <= 0)
								<tr>
									<th class="text-center">{{ $i }}</th>
									<td colspan="2" class="text-center">{{ $menu->mn_name }}</td>
									<td class="text-center"><input type="checkbox" name="menu[{{ $menu->mn_id }}]" {{ !empty($role_menus[$menu->mn_id]) ? 'checked' : null }}></td>
								</tr>
								@endif
								@foreach($menu->sub_menu() as $key2 => $sub_menu)
								<tr>
									<th class="text-center">{{ $i++ }}</th>
									<td class="text-center">{{ $menu->mn_name }}</td>
									<td class="text-center">{{ $sub_menu->mn_name }}</td>
									<td class="text-center"><input type="checkbox" name="menu[{{ $sub_menu->mn_id }}]" {{ !empty($role_menus[$sub_menu->mn_id]) ? 'checked' : null }}></td>
								</tr>
								@endforeach
								@php $i++ @endphp
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2"><a href="{{ route('role') }}" class="btn btn-lg btn-secondary btn-block"><i class="fa fa-fw fa-window-close"></i>&nbsp;&nbsp;Close</a></td>
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
