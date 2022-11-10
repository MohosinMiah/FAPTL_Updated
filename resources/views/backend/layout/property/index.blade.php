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
			<h3 class="text text-info">Property List</h3>
			<a href="{{ route('property_add_form') }}" class="btn btn-primary marginBottom" >Add New Property</a>
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
									<th>Type</th>
									<th>City</th>
									<th>State</th>
									<th>Zip</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Type</th>
									<th>City</th>
									<th>State</th>
									<th>Zip</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['properties'] as $property )
									<tr>
										<td>{{ $property->id }}</td>
										<td>{{ $property->name }}</td>
										<td>
											<?php
											if( $property->type == 1 )
											{
												echo "Multiple Unit";
											}
											elseif( $property->type == 2 )
											{
												echo "Single Unit";
											}
											
											?>
										</td>
										<td>{{ $property->city }}</td>
										<td>{{ $property->state }}</td>
										<td>{{ $property->zip }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('property_show', $property->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('property_edit', $property->id) }}"><i class="fa fa-edit"></i></a>
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
