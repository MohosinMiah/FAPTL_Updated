@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">Edit Property</h3>
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
		<?php $property = $data['property']; ?>
		<div class="col-md-12">
			{{--  property Registration Form Start   --}}
			<form method="post" action="{{ route('property_update_save' , $property->id ) }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">property Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control" value="{{ $property->name }}">
					<input class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">
				</div>

				<div class="form-group">
					<label for="type"> Type <span class="required_field"> (*) </span> </label>
						<select class="form-control" name="type" id="type" required>
							<option value="1" <?php if( $property->type == 1 ) { echo "selected"; } ?> > Multiple Unit</option>
							<option value="2" <?php if( $property->type == 2 ) { echo "selected"; } ?> > Single Unit</option>
						</select>
				</div>

				
				<div class="form-group">
					<label for="size"> Size <span class="required_field"> (*) </span> </label>
					<input type="number" name="size" id="size"  class="form-control"  value="{{ $property->size }}" >
				</div>

				<div class="form-group">
					<label for="address"> Address  </label>
					<textarea name="address" id="address" >{{ $property->address }}</textarea> 
				</div>

				<div class="form-group">
					<label for="city"> City  </label>
					<input type="text" name="city" id="city" class="form-control"   value="{{ $property->city }}" >
				</div>

				<div class="form-group">
					<label for="state"> State  </label>
					<input type="text" name="state" id="state" class="form-control"   value="{{ $property->state }}" >
				</div>

				<div class="form-group">
					<label for="zip"> Zip  </label>
					<input type="text" name="zip" id="zip" class="form-control"  value="{{ $property->zip }}" >
				</div>



				<div class="form-group">
					<label for="note"> Note </label>
					<textarea name="note" id="note" >{{ $property->note }}</textarea> 
				</div>


				<button type="submit" class="btn btn-primary">Update property</button>
			</form>
			{{--  property Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
