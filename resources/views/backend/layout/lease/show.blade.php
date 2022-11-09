@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Show Tenant</h1>

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
		<?php $tenant = $data['tenant']; ?>
		<div class="col-md-12">
			{{--  tenant Registration Form Start   --}}
			<form  enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Tenant Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  value="{{ $tenant->name }}" readonly>
				</div>

				
				<div class="form-group">
					<label for="phone"> phone <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  class="form-control"  value="{{ $tenant->phone }}" readonly >
				</div>

	

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" name="email" id="email" class="form-control"    value="{{ $tenant->email }}" readonly >
				</div>


				<div class="form-group">
					<label for="birth_date"> Date Of Birth  </label>
					<input type="date" name="birth_date" id="birth_date" class="form-control"   value="{{ $tenant->birth_date }}" readonly >
				</div>

				<div class="form-group">
					<label for="id_number"> ID Number  </label>
					<input type="text" name="id_number" id="id_number" class="form-control"   value="{{ $tenant->id_number }}" readonly >
				</div>

				<div class="form-group">
					<label for="gender"> Gender</label>
						<select class="form-control" name="gender" id="gender" readonly>
							<option value="Male" <?php if( $tenant->gender == "Male" ) { echo "selected"; } ?> >Male</option>
							<option value="Female" <?php if( $tenant->gender == "Female" ) { echo "selected"; } ?> >Female</option>
							<option value="Other" <?php if( $tenant->gender == "Other" ) { echo "selected"; } ?>>Other</option>
						</select>
				</div>

				<div class="form-group">
					<label for="emergency_contact_name"> Emergency Contact Name</label>
					<input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control"   value="{{ $tenant->emergency_contact_name }}" readonly >
				</div>

				<div class="form-group">
					<label for="emergency_contact_relationship"> Emergency Contact Relationship</label>
					<input type="text" name="emergency_contact_relationship" id="emergency_contact_relationship" class="form-control" value="{{ $tenant->emergency_contact_relationship }}" readonly >
				</div>

				<div class="form-group">
					<label for="emergency_contact_phone"> Emergency Contact Phone</label>
					<input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" value="{{ $tenant->emergency_contact_phone }}" readonly >
				</div>

				<div class="form-group">
					<label for="emergency_contact_email"> Emergency Contact Email</label>
					<input type="text" name="emergency_contact_email" id="emergency_contact_email" class="form-control"  value="{{ $tenant->emergency_contact_email }}" readonly >
				</div>

				<a t class="btn btn-primary">Back To Tenant List</a>
			</form>
			{{--  tenant Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
