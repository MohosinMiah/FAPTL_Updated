<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\PropertyUnit;
// use App\Http\Requests\StoreLeaseRequest;
// use App\Http\Requests\UpdateLeaseRequest;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;


class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leases = Lease::all();
		$data = [
			'leases' => $leases
		];
		return view('backend.layout.lease.index',compact('data'));
    }


    public function property_unit_list( $propertyID )
    {
        $property_units = DB::table('property_unities')->where( 'property_id' , $propertyID )->get();
        return response()->json($property_units); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenants = Tenant::all();
        $properties = Property::all();
		$data = [
			'tenants' => $tenants,
			'properties' => $properties,
		];
		return view('backend.layout.lease.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make( $request->all(), [
			// 'name'     => 'required',
			// 'phone'     => 'required',
		]);

		if( $validator->fails() )
		{
			return redirect(route('lease_add_form'))->with('status', 'Fail, Lease is not created');
		}
		else
		{
			$lease = new Lease();

			$lease->tenant_id = $request->tenant_id;
			$lease->property_id = $request->property_id;
			$lease->unit_id = $request->unit_id;
			$lease->rent_amount = $request->rent_amount;
			$lease->security_deposit = $request->security_deposit;
			$lease->pet_security_deposit = $request->pet_security_deposit;
			$lease->lease_start = $request->lease_start;
			$lease->lease_end = $request->lease_end;
			$lease->user_id = 1;
			$save =  $lease->save();

			return redirect(route('lease_add_form'))->with('status', 'Success, Lease is successfully created');

		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show( $leaseID )
    {
        $lease = DB::table( 'leases' )->where( 'id' , $leaseID )->first();
		$data = [
			'lease' => $lease,
		];

		return view( 'backend.layout.lease.show' , compact( 'data' ) );
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function edit(Lease $lease)
    {
        $lease = DB::table( 'leases' )->where( 'id' , $leaseID )->first();

		$data = [
			'lease' => $lease
		];

		return view( 'backend.layout.lease.edit' , compact( 'data' ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaseRequest  $request
     * @param  \App\Models\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaseRequest $request, Lease $lease)
    {
        $validator =  Validator::make($request->all(), [

			'name'     => 'required',
			'phone'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('lease_edit',$leaseID))->with('status', 'Fail, Lease is not updated');
		}
		else
		{
			$lease = Lease::find( $leaseID );

			$lease->name = $request->name;
			$lease->phone = $request->phone;
			$lease->email = $request->email;
			$lease->birth_date = $request->birth_date;
			$lease->id_number = $request->id_number;
			$lease->gender = $request->gender;
			$lease->emergency_contact_name = $request->emergency_contact_name;
			$lease->emergency_contact_relationship = $request->emergency_contact_relationship;
			$lease->emergency_contact_phone = $request->emergency_contact_phone;
			$lease->emergency_contact_email = $request->emergency_contact_email;
			$lease->user_id = 1;

			$save =  $lease->save();

			return redirect(route('lease_edit',$leaseID))->with('status', 'Success, Lease is Updated');
		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lease $lease)
    {
        //
    }
}
