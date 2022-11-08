@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Add New Property Unit</h1>

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
		<?php $property = $data['property']; ?>

		<div class="col-md-12">
			{{--  Property Registration Form Start   --}}
			<form method="post" action="{{ route('property_unit_add_form_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="property_name">Property Name <span class="required_field"> (*) </span> </label>
					<input type="text"  class="form-control" value="{{ $property->name }}"  >
					<input type="hidden" name="property_id" id="property_id"  value="{{ $property->id }}"  >
				</div>

				
				<div class="form-group">
					<label for="name"> Unit<span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  class="form-control"  placeholder="Property Unit Name">
				</div>


				<div class="form-group">
					<label for="rent_amount"> Rent Amount<span class="required_field"> (*) </span> </label>
					<input type="number" name="rent_amount" id="rent_amount"  class="form-control"  placeholder="Rent Amount">
				</div>
				


				<div class="form-group">
					<label for="size"> Size<span class="required_field"> (*) </span> </label>
					<input type="number" name="size" id="size"  class="form-control"  placeholder="Size">
				</div>
				


				<div class="form-group">
					<label for="total_room"> Total Room <span class="required_field"> (*) </span> </label>
					<input type="number" name="total_room" id="total_room"  class="form-control"  placeholder="Total Room">
				</div>
				


				<div class="form-group">
					<label for="bed_room"> Bed Room <span class="required_field"> (*) </span> </label>
					<input type="number" name="bed_room" id="bed_room"  class="form-control"  placeholder="Bed Room">
				</div>

				<div class="form-group">
					<label for="bath_room"> Bath Room <span class="required_field"> (*) </span> </label>
					<input type="number" name="bath_room" id="bath_room"  class="form-control"  placeholder="Bath Room">
				</div>

				<div class="form-group">
					<label for="balcony">Balcony <span class="required_field"> (*) </span> </label>
					<input type="number" name="balcony" id="balcony"  class="form-control"  placeholder="Balcony">
				</div>
				

				<div class="form-group">
					<label for="note"> Note </label>
					<textarea name="note" id="note" ></textarea> 
				</div>


				<button type="submit" class="btn btn-primary">Add Property Unit</button>
			</form>
			{{--  Property Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
