<?php

namespace App\Http\Controllers;

use App\Models\Property;
// use App\Http\Requests\StorePropertyRequest;
// use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
		$data = [
			'properties' => $properties
		];
		return view('backend.layout.property.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layout.property.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
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
			'name'     => 'required',
			'type'     => 'required',
			'size'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('property_add_form'))->with('status', 'Fail, Property is not created');
		}
		else
		{
			$property = new Property();

			$property->name = $request->name;
			$property->type = $request->type;
			$property->size = $request->size;
			$property->address = $request->address;
			$property->city = $request->city;
			$property->state = $request->state;
			$property->zip = $request->zip;
			$property->note = $request->note;
			$property->user_id = 1;
			$save =  $property->save();

			return redirect(route('property_add_form'))->with('status', 'Success, Property is successfully created');

		}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show( $propertyID )
    {
        $property = DB::table( 'properties' )->where( 'id' , $propertyID )->first();

		$data = [
			'property' => $property
		];

		return view( 'backend.layout.property.show' , compact( 'data' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit( $propertyID )
    {
        $property = DB::table( 'properties' )->where( 'id' , $propertyID )->first();

		$data = [
			'property' => $property
		];

		return view( 'backend.layout.property.edit' , compact( 'data' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $propertyID )
    {
		$validator =  Validator::make($request->all(), [
			// 'phone'    => [
			// 	'required',
			// 	'max:11',
			// 	Rule::unique('authentications'),
			// ],
			'name'     => 'required',
			'type'     => 'required',
			'size'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('property_edit', $propertyID ))->with('status', 'Fail, Property is not updated');
		}
		else
		{
			$property =  Property::find( $propertyID );

			$property->name    = $request->name;
			$property->type    = $request->type;
			$property->size    = $request->size;
			$property->address = $request->address;
			$property->city    = $request->city;
			$property->state   = $request->state;
			$property->zip     = $request->zip;
			$property->note    = $request->note;
			$property->user_id = 1;
			$save =  $property->save();

			return redirect(route('property_edit', $propertyID ))->with('status', 'Success, Property is successfully updated');

		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
