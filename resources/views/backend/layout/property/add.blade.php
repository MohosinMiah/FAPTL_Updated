@extends('backend.home')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">Add New Property</h3>
			<a href="{{ route('property_list') }}" class="btn btn-primary marginBottom" >Property List</a>
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

			{{--  Property Registration Form Start    --}}
			<form method="post" action="{{ route('property_add_form_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Property Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  placeholder="Property Name" >
				</div>

				<div class="form-group">
					<label for="type"> Type <span class="required_field"> (*) </span> </label>
						<select class="form-control" name="type" id="type" required>
							<option value="1">Multiple Unit</option>
							<option value="2">Single Unit</option>
						</select>
				</div>

				
				<div class="form-group">
					<label for="size"> Size <span class="required_field"> (*) </span> </label>
					<input type="number" name="size" id="size"  class="form-control"  placeholder="Property Size">
				</div>

				<div class="form-group">
					<label for="address"> Address  </label>
					<textarea name="address" id="address" ></textarea> 
				</div>

				<div class="form-group">
					<label for="city"> City  </label>
					<input type="text" name="city" id="city" class="form-control"   placeholder="City Name">
				</div>

				<div class="form-group">
					<label for="state"> State  </label>
					<input type="text" name="state" id="state" class="form-control"   placeholder="State Name">
				</div>

				<div class="form-group">
					<label for="zip"> Zip  </label>
					<input type="text" name="zip" id="zip" class="form-control"   placeholder="Zip Code">
				</div>



				<div class="form-group">
					<label for="note"> Note </label>
					<textarea name="note" id="note" ></textarea> 
				</div>


				<button type="submit" class="btn btn-primary">Add Property</button>
			</form>
			{{--  Property Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
