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
	<?php $property = $data['property']; ?>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">View Property : {{ $property->name }} , ID: {{  $property->id }}</h1>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			{{--  property Registration Form Start   --}}
			<table class="table">
				<tbody>
					<tr>
						<td class="themeLabel">Property Name : </td>
						<td>{{ $property->name }}</td>
					</tr>
					<tr>
						<td class="themeLabel">Type : </td>
						<td>
							<?php if( $property->type == 1 ) { echo "Multiple Unit"; } ?>
							<?php if( $property->type == 2 ) { echo "Single Unit"; } ?>
						</td>
					</tr>
					<tr>
						<td class="themeLabel">City : </td>
						<td> {{ $property->city }} </td>
					</tr>
					<tr>
						<td class="themeLabel">State : </td>
						<td> {{ $property->state }}</td>
					</tr>
					<tr>
						<td class="themeLabel">Address : </td>
						<td>
							{{ $property->address }}
						</td>
					</tr>
					<tr>
						<td class="themeLabel">Size : </td>
						<td> {{ $property->size }}</td>
					</tr>
					<tr>
						<td>
							<?php
							if( $property->type == 1 )
							{
								?>
								<a class="theme-btn " href="{{ route('property_unit_add_form', $property->id) }}"> Add New Unit</a>
								<?php
							}
							?>
							<a class="theme-btn" href="{{ route('property_unit_list') }}"> All Units</a>
							<a class="theme-btn " href="{{ route('property_list') }}"> Property List</a>
						</td>
					</tr>
				</tbody>
		
			  </table>
			{{--  <form>
				@csrf
				<div class="form-group">
					<label for="name">property Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control" value="{{ $property->name }}" readonly >
				</div>

				<div class="form-group">
					<label for="type"> Type <span class="required_field"> (*) </span> </label>
						<select class="form-control" name="type" id="type" readonly>
							<option value="1" <?php if( $property->type == 1 ) { echo "selected"; } ?>>Multiple Unit</option>
							<option value="2" <?php if( $property->type == 2 ) { echo "selected"; } ?>>Single Unit</option>
						</select>
				</div>

				
				<div class="form-group">
					<label for="size"> Size <span class="required_field"> (*) </span> </label>
					<input type="number" name="size" id="size"  class="form-control"  value="{{ $property->size }}" readonly >
				</div>

				<div class="form-group">
					<label for="address"> Address  </label>
					<textarea name="address" id="address"  readonly >{{ $property->address }}</textarea> 
				</div>

				<div class="form-group">
					<label for="city"> City  </label>
					<input type="text" name="city" id="city" class="form-control"   value="{{ $property->city }}" readonly >
				</div>

				<div class="form-group">
					<label for="state"> State  </label>
					<input type="text" name="state" id="state" class="form-control"   value="{{ $property->state }}" readonly>
				</div>

				<div class="form-group">
					<label for="zip"> Zip  </label>
					<input type="text" name="zip" id="zip" class="form-control"  value="{{ $property->zip }}" readonly>
				</div>



				<div class="form-group">
					<label for="note"> Note </label>
					<textarea readonly >{{ $property->note }}</textarea> 
				</div>


				<a  class="btn btn-primary" >Update Property</a>
			</form>  --}}
			{{--  property Registration Form Start   --}}

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

		</div>
	</div>

</div>

@endsection
