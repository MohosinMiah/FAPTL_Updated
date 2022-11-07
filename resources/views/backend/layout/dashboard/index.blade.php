@extends('backend.home')

@section('content')

<div class="container-fluid">
	<form>
		<div className="form-oneline">
			<div className="form-outline">
				<label className="form-label themeLabel">Property Name<sup>*</sup></label>
				<input type="text" name="name" className="form-control"/>
			</div>

			<div className="form-outline">
				<label className="form-label themeLabel">Type <sup>*</sup></label>
				<select  name="type" className="form-control"  >
					<option value="2">222</option>
				
				</select>
			</div>

			<div className="form-outline">
				<label className="form-label themeLabel">Size<sup>*</sup></label>
				<input type="number" name="size" className="form-control"  />
			</div>
		</div>
			<div className="form-outline address">
				<label className="form-label themeLabel">Address</label>
				<input type="text" name="address" className="form-control"/>
			</div>
			<div className="form-oneline">
				<div className="form-outline">
					<label className="form-label themeLabel">City<sup>*</sup></label>
					<input type="text" name="city" className="form-control" />
				</div>
				<div className="form-outline">
					<label className="form-label themeLabel">State<sup>*</sup></label>
					<input type="text" name="state" className="form-control" />
				</div>
				<div className="form-outline">
					<label className="form-label themeLabel">Zip<sup>*</sup></label>
					<input type="number" name="zip" className="form-control" />
				</div>
			</div>
			
			<div className="form-outline one-line">
				<label className="form-label themeLabel">Note</label>
				<textarea name="note"  className="form-control"></textarea>
			</div>

		
			<button type="submit" className="form-btn">Add Property</button>
		</form>
</div>

@endsection
