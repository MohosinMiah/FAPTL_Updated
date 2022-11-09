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
	<h1 class="h3 mb-4 text-gray-800"> Tenant List</h1>

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
									<th>Tenant Name</th>
									<th>Property Name</th>
									<th>Property Unit</th>
									<th>Rent Amount</th>
									<th>Lease Start</th>
									<th>Lease End</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Tenant Name</th>
									<th>Property Name</th>
									<th>Property Unit</th>
									<th>Rent Amount</th>
									<th>Lease Start</th>
									<th>Lease End</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['leases'] as $lease )

								<?php 
								$tenant         = DB::table( 'tenants' )->where( 'id' , $lease->tenant_id )->first();
								$property       = DB::table( 'properties' )->where( 'id' , $lease->property_id  )->first();
								$property_unite = DB::table( 'property_unities' )->where( 'id' , $lease->unit_id  )->first();
								?>
									<tr>
										<td>{{ $lease->id }}</td>
										<td>{{ $tenant->name }}</td>
										<td>{{ $property->name }}</td>
										<td>{{ $property_unite->name }}</td>
										<td>{{ $lease->rent_amount }}</td>
										<td>{{ $lease->lease_start }}</td>
										<td>{{ $lease->lease_end }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('lease_show', $lease->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('lease_edit', $lease->id) }}"><i class="fa fa-edit"></i></a>
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
