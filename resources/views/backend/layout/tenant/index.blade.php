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
			<h3 class="text text-info">Tenant List</h3>
			<a href="{{ route('tenant_add_form') }}" class="btn btn-primary marginBottom" > Add New Tenant</a>
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
									<th>Phone</th>
									<th>Email</th>
									<th>ID Number</th>
									<th>Gender</th>
									<th>Date Of Birth</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>ID Number</th>
									<th>Gender</th>
									<th>Date Of Birth</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['tenants'] as $tenant )
									<tr>
										<td>{{ $tenant->id }}</td>
										<td>{{ $tenant->name }}</td>
										<td>{{ $tenant->phone }}</td>
										<td>{{ $tenant->email }}</td>
										<td>{{ $tenant->id_number }}</td>
										<td>{{ $tenant->gender }}</td>
										<td>{{ $tenant->birth_date }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('tenant_show', $tenant->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('tenant_edit', $tenant->id) }}"><i class="fa fa-edit"></i></a>
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
