@extends('backend.home')

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">Property Unit List</h3>
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			{{--  Property List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Floor</th>
									<th>Rent Amount</th>
									<th>Size</th>
									<th>Total Room</th>
									<th>Bed Room</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Floor</th>
									<th>Rent Amount</th>
									<th>Size</th>
									<th>Total Room</th>
									<th>Bed Room</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['property_unities'] as $property_unit )
									<tr>
										<td>{{ $property_unit->id }}</td>
										<td>{{ $property_unit->name }}</td>
										<td>{{ $property_unit->floor }}</td>
										<td>{{ $property_unit->rent_amount }}</td>
										<td>{{ $property_unit->size }}</td>
										<td>{{ $property_unit->total_room }}</td>
										<td>{{ $property_unit->bed_room }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('property_unit_show', $property_unit->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('property_unit_edit', $property_unit->id) }}"><i class="fa fa-edit"></i></a>
										</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  Property List  Start   --}}

		</div>
	</div>

</div>

@endsection
