@extends('backend.home')

@section('content')

<div class="container-fluid">

	<?php $lease = $data['lease']; ?>

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">Show Lease</h3>
			<a href="{{ route('lease_list') }}" class="btn btn-primary marginBottom" > Lease List</a>
		</div>
	</div>

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
		<div class="col-md-12">
			{{--  lease Registration Form Start   --}}
			<form>
				<div class="form-group">
					<label for="tenant_id" class="form-label">Select Tenant <span class="required_field"> (*) </span></label>
					<select id="tenant_id" class="form-control" name="tenant_id" readonly >
						@foreach ( $data['tenants'] as $tenant )
							<option value="{{ $tenant->id }}" <?php if( $tenant->id == $lease->tenant_id ) { echo "selected"; } ?> >{{ $tenant->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="property_id" class="form-label">Select Property <span class="required_field"> (*) </span></label>
					<select id="property_id" class="form-control" name="property_id" readonly >
						<option value="">Select Property</option>
						@foreach ( $data['properties'] as $property )
							<option value="{{ $property->id }}" <?php if( $property->id == $lease->property_id ) { echo "selected"; } ?> >{{ $property->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="unit_id" class="form-label">Select Unit ID <span class="required_field"> (*) </span></label>
					<select id="unit_id" class="form-control" name="unit_id" readonly >
						<option value="">Select Property Unit</option>
						@foreach ( $data['propertyUnits'] as $propertyUnit )
							<option value="{{ $propertyUnit->id }}" <?php if( $propertyUnit->id == $lease->unit_id ) { echo "selected"; } ?> >{{ $propertyUnit->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="rent_amount"> Rent Amount <span class="required_field"> (*) </span> </label>
					<input type="number" name="rent_amount" id="rent_amount"  class="form-control"  value="{{ $lease->rent_amount }}" readonly >
				</div>

	

				<div class="form-group">
					<label for="security_deposit"> Security Deposit  </label>
					<input type="number" name="security_deposit" id="security_deposit"  class="form-control"  value="{{ $lease->security_deposit }}" readonly >
				</div>


				<div class="form-group">
					<label for="pet_security_deposit"> Pet Security Deposit  </label>
					<input type="number" name="pet_security_deposit" id="pet_security_deposit" class="form-control"  value="{{ $lease->pet_security_deposit }}" readonly >
				</div>

				<hr>
				<div class="form-group">
					<label for="invoice_starting_date"> Invoice Start Date  </label>
					<input type="date" name="invoice_starting_date" id="invoice_starting_date" class="form-control" value="{{ $lease->invoice_starting_date }}" readonly  >
				</div>

				<div class="form-group">
					<label for="invoice_amount"> Invoice Amount  </label>
					<input type="number" name="invoice_amount" id="invoice_amount"  class="form-control" value="{{ $lease->invoice_amount }}" readonly >
				</div>

				<div class="form-group">
					<label for="prorated_amount"> Prorated Rent  </label>
					<input type="number" name="prorated_amount" id="prorated_amount"  class="form-control" value="{{ $lease->prorated_amount }}" readonly >
				</div>

				<div class="form-group">
					<label for="prorated_starting_date"> Prorated Start Date  </label>
					<input type="date" name="prorated_starting_date" id="prorated_starting_date" class="form-control" value="{{ $lease->prorated_starting_date }}" readonly >
				</div>

				<hr>

				<div class="form-group">
					<label for="lease_start"> Lease Start  </label>
					<input type="date" name="lease_start" id="lease_start" class="form-control" value="{{ $lease->lease_start }}" readonly >
				</div>

				<div class="form-group">
					<label for="lease_start"> Lease End  </label>
					<input type="date" name="lease_end" id="lease_end" class="form-control"  value="{{ $lease->lease_end }}" readonly  >
				</div>

				<div class="form-group">
					<label for="termination_date"> Tarminated Date  </label>
					<input type="date" name="termination_date" id="termination_date" class="form-control"  value="{{ $lease->termination_date }}" readonly  >
				</div>

				<div class="form-group">
					<label for="isActive"> Lease Status </label>
						<select class="form-control" name="isActive" id="isActive" readonly>
							<option value="1" <?php if( $lease->isActive == 1 ) { echo "selected"; } ?>>Active</option>
							<option value="2" <?php if( $lease->isActive == 2 ) { echo "selected"; } ?>>Deactive</option>
						</select>
				</div>
				<a href="{{ route('lease_list') }}" class="btn btn-primary" > Back To Lease List</a>
			</form>
			{{--  lease Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
