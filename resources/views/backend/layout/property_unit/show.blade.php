@extends('backend.home')

@section('content')

<div class="container-fluid">
	<?php
	$property = $data['property'];
	$property_unit = $data['property_unit'];
	?>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">View Property Unit : {{ $property_unit->name }} , ID: {{  $property_unit->id }}</h1>
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">View Property Unit : {{ $property_unit->name }} , ID: {{  $property_unit->id }}</h3>
			<a href="{{ route('property_unit_list') }}" class="btn btn-primary marginBottom" > Unit List</a>
		</div>
	</div>

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
						<label for="property_id">Property Name <span class="required_field"> (*) </span> </label>
						<input type="text"  class="form-control" value="{{ $property->name }}" readonly >
						<input type="hidden" name="property_id" id="property_id"  value="{{ $property->id }}"  >
					</div>
	
					
					<div class="form-group">
						<label for="name"> Unit<span class="required_field"> (*) </span> </label>
						<input type="text" name="name" id="name"  class="form-control" value="{{ $property_unit->name }}" readonly >
					</div>
	
	
					<div class="form-group">
						<label for="rent_amount"> Rent Amount<span class="required_field"> (*) </span> </label>
						<input type="number" name="rent_amount" id="rent_amount"  class="form-control"  value="{{ $property_unit->rent_amount }}" readonly >
					</div>
					
	
	
					<div class="form-group">
						<label for="size"> Size<span class="required_field"> (*) </span> </label>
						<input type="number" name="size" id="size"  class="form-control"  value="{{ $property_unit->size }}" readonly  >
					</div>
					
	
	
					<div class="form-group">
						<label for="total_room"> Total Room <span class="required_field"> (*) </span> </label>
						<input type="number" name="total_room" id="total_room"  class="form-control"  value="{{ $property_unit->total_room }}" readonly >
					</div>
					
	
	
					<div class="form-group">
						<label for="bed_room"> Bed Room <span class="required_field"> (*) </span> </label>
						<input type="number" name="bed_room" id="bed_room"  class="form-control"  value="{{ $property_unit->bed_room }}" readonly >
					</div>
	
					<div class="form-group">
						<label for="bath_room"> Bath Room <span class="required_field"> (*) </span> </label>
						<input type="number" name="bath_room" id="bath_room"  class="form-control"  value="{{ $property_unit->bath_room }}"  readonly >
					</div>
	
					<div class="form-group">
						<label for="balcony">Balcony <span class="required_field"> (*) </span> </label>
						<input type="number" name="balcony" id="balcony"  class="form-control"   value="{{ $property_unit->balcony }}" readonly >
					</div>
					
	
					<div class="form-group">
						<label for="note"> Note </label>
						<textarea name="note" id="note" readonly>{{ $property_unit->note }}</textarea> 
					</div>
	

				<a href="{{ route('property_unit_list') }}" class="btn btn-primary marginBottom" >Back To Property Unit List </a>
			</form>
			{{--  property Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
