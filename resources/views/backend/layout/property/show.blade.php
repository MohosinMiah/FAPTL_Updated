@extends('backend.home')

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
			<form>
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


				<button type="submit" class="btn btn-primary" >Update Property</button>
			</form>
			{{--  property Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
