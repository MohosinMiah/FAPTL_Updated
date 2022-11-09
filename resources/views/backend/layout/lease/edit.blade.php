@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Edit Lease</h1>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-info">
				{{ session('status') }}
			</div>
		@endif

		@if (Session::has('message'))
			<h4 class="text-info">{!! session('message') !!}</h4>
		@endif

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<?php $lease = $data['lease']; ?>
		<div class="col-md-12">
			{{--  lease Registration Form Start   --}}
			<form method="post" action="{{ route('lease_update_save' , $lease->id ) }}" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group">
					<label for="tenant_id" class="form-label">Select Tenant <span class="required_field"> (*) </span></label>
					<select id="tenant_id" class="form-control" name="tenant_id">
						@foreach ( $data['tenants'] as $property )
							<option value="{{ $property->id }}">{{ $property->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="property_id" class="form-label">Select Property <span class="required_field"> (*) </span></label>
					<select id="property_id" class="form-control" name="property_id">
						<option value="">Select Property</option>
						@foreach ( $data['properties'] as $property )
							<option value="{{ $property->id }}">{{ $property->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="unit_id" class="form-label">Select Unit ID <span class="required_field"> (*) </span></label>
					<select id="unit_id" class="form-control" name="unit_id">
						<option value="">Select Property Unit</option>
					</select>
				</div>

				<div class="form-group">
					<label for="rent_amount"> Rent Amount <span class="required_field"> (*) </span> </label>
					<input type="number" name="rent_amount" id="rent_amount"  class="form-control"  placeholder="Rent Amount">
				</div>

	

				<div class="form-group">
					<label for="security_deposit"> Security Deposit  </label>
					<input type="number" name="security_deposit" id="security_deposit"  class="form-control"  placeholder="Security Deposit Amount">
				</div>


				<div class="form-group">
					<label for="pet_security_deposit"> Pet Security Deposit  </label>
					<input type="number" name="pet_security_deposit" id="pet_security_deposit" class="form-control"  placeholder="Pet Security Deposit Amount" >
				</div>

				<div class="form-group">
					<label for="lease_start"> Lease Start  </label>
					<input type="date" name="lease_start" id="lease_start" class="form-control"   >
				</div>

				<div class="form-group">
					<label for="lease_start"> Lease End  </label>
					<input type="date" name="lease_end" id="lease_end" class="form-control"   >
				</div>

				<button type="submit" class="btn btn-primary">Update lease</button>
			</form>
			{{--  lease Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
