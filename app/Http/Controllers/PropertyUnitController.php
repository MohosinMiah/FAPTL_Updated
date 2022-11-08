<?php

namespace App\Http\Controllers;

use App\Models\PropertyUnit;
use App\Models\Property;
// use App\Http\Requests\StorePropertyUnitRequest;
// use App\Http\Requests\UpdatePropertyUnitRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;

class PropertyUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property_unities = PropertyUnit::all();
		$data = [
			'property_unities' => $property_unities
		];
		return view('backend.layout.property_unit.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $propertyID )
    {
        $property = Property::where('id', $propertyID)->first();
		$data = [
			'property' => $property
		];
		return view('backend.layout.property_unit.add',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
			// 'phone'    => [
			// 	'required',
			// 	'max:11',
			// 	Rule::unique('authentications'),
			// ],
			'property_id'     => 'required',
			'name'     => 'required',
			'rent_amount'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('property_unit_add_form',$request->property_id))->with('status', 'Fail, Property Unit is not created');
		}
		else
		{
			$propertyUnit = new PropertyUnit();

			$propertyUnit->property_id = $request->property_id;
		
			$propertyUnit->name = $request->name;
		
			$propertyUnit->rent_amount = $request->rent_amount;
		
			$propertyUnit->floor = $request->floor;
		
			$propertyUnit->size = $request->size;
		
			$propertyUnit->total_room = $request->total_room;
		
			$propertyUnit->bed_room = $request->bed_room;
		
			$propertyUnit->bath_room = $request->bath_room;
		
			$propertyUnit->balcony = $request->balcony;
		
			$propertyUnit->note = $request->note;
		
			$propertyUnit->user_id = 1;
		
		
			$save =  $propertyUnit->save();

			return redirect(route('property_unit_add_form',$request->property_id))->with('status', 'Success, Property Unit is successfully created');

		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyUnit  $propertyUnit
     * @return \Illuminate\Http\Response
     */
    public function show( $propertyUnitID )
    {
        $property_unit = DB::table( 'property_unities' )->where( 'id' , $propertyUnitID )->first();
        $property = Property::where('id', $property_unit->property_id )->first();
		$data = [
            'property'      => $property,
			'property_unit' => $property_unit
		];

		return view( 'backend.layout.property_unit.show' , compact( 'data' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyUnit  $propertyUnit
     * @return \Illuminate\Http\Response
     */
    public function edit( $propertyUnitID )
    {
        $property_unit = DB::table( 'property_unities' )->where( 'id' , $propertyUnitID )->first();
        $property = Property::where('id', $property_unit->property_id )->first();
		$data = [
            'property'      => $property,
			'property_unit' => $property_unit
		];

		return view( 'backend.layout.property_unit.edit' , compact( 'data' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyUnitRequest  $request
     * @param  \App\Models\PropertyUnit  $propertyUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $propertyUnitID )
    {
        $validator =  Validator::make($request->all(), [
			// 'phone'    => [
			// 	'required',
			// 	'max:11',
			// 	Rule::unique('authentications'),
			// ],
			'property_id'     => 'required',
			'name'     => 'required',
			'rent_amount'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('property_unit_edit', $propertyUnitID))->with('status', 'Fail, Property Unit is not Updated');
		}
		else
		{
			$propertyUnit = PropertyUnit::find( $propertyUnitID  );

			$propertyUnit->property_id = $request->property_id;
		
			$propertyUnit->name = $request->name;
		
			$propertyUnit->rent_amount = $request->rent_amount;
		
			$propertyUnit->floor = $request->floor;
		
			$propertyUnit->size = $request->size;
		
			$propertyUnit->total_room = $request->total_room;
		
			$propertyUnit->bed_room = $request->bed_room;
		
			$propertyUnit->bath_room = $request->bath_room;
		
			$propertyUnit->balcony = $request->balcony;
		
			$propertyUnit->note = $request->note;
		
			$propertyUnit->user_id = 1;
		
		
			$save =  $propertyUnit->save();

			return redirect(route('property_unit_edit', $propertyUnitID))->with('status', 'Success, Property Unit is  Updated');

		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyUnit  $propertyUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyUnit $propertyUnit)
    {
        //
    }
}
