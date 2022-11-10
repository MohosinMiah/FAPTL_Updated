@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">Edit Tenant</h3>
			<a href="{{ route('tenant_list') }}" class="btn btn-primary marginBottom" > Unit List</a>
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
		<?php $tenant = $data['tenant']; ?>
		<div class="col-md-12">
			{{--  tenant Registration Form Start   --}}
			<form method="post" action="{{ route('tenant_update_save' , $tenant->id ) }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Tenant Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  value="{{ $tenant->name }}" >
				</div>

				
				<div class="form-group">
					<label for="phone"> phone <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  class="form-control"  value="{{ $tenant->phone }}" >
				</div>

	

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" name="email" id="email" class="form-control"    value="{{ $tenant->email }}"  >
				</div>


				<div class="form-group">
					<label for="birth_date"> Date Of Birth  </label>
					<input type="date" name="birth_date" id="birth_date" class="form-control"   value="{{ $tenant->birth_date }}"  >
				</div>

				<div class="form-group">
					<label for="id_number"> ID Number  </label>
					<input type="text" name="id_number" id="id_number" class="form-control"   value="{{ $tenant->id_number }}" >
				</div>

				<div class="form-group">
					<label for="gender"> Gender</label>
						<select class="form-control" name="gender" id="gender" >
							<option value="Male" <?php if( $tenant->gender == "Male" ) { echo "selected"; } ?> >Male</option>
							<option value="Female" <?php if( $tenant->gender == "Female" ) { echo "selected"; } ?> >Female</option>
							<option value="Other" <?php if( $tenant->gender == "Other" ) { echo "selected"; } ?>>Other</option>
						</select>
				</div>

				<div class="form-group">
					<label for="emergency_contact_name"> Emergency Contact Name</label>
					<input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control"   value="{{ $tenant->emergency_contact_name }}" >
				</div>

				<div class="form-group">
					<label for="emergency_contact_relationship"> Emergency Contact Relationship</label>
					<input type="text" name="emergency_contact_relationship" id="emergency_contact_relationship" class="form-control" value="{{ $tenant->emergency_contact_relationship }}"  >
				</div>

				<div class="form-group">
					<label for="emergency_contact_phone"> Emergency Contact Phone</label>
					<input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" value="{{ $tenant->emergency_contact_phone }}" >
				</div>

				<div class="form-group">
					<label for="emergency_contact_email"> Emergency Contact Email</label>
					<input type="text" name="emergency_contact_email" id="emergency_contact_email" class="form-control"  value="{{ $tenant->emergency_contact_email }}"  >
				</div>

				<button type="submit" class="btn btn-primary">Update tenant</button>
			</form>
			{{--  tenant Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
