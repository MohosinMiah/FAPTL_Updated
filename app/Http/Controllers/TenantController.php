<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
// use App\Http\Requests\StoreTenantRequest;
// use App\Http\Requests\UpdateTenantRequest;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::all();
		$data = [
			'tenants' => $tenants
		];
		return view('backend.layout.tenant.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layout.tenant.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTenantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $validator =  Validator::make($request->all(), [

			'name'     => 'required',
			'phone'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('tenant_add_form'))->with('status', 'Fail, Tenant is not created');
		}
		else
		{
			$tenant = new Tenant();

			$tenant->name = $request->name;
			$tenant->phone = $request->phone;
			$tenant->email = $request->email;
			$tenant->birth_date = $request->birth_date;
			$tenant->id_number = $request->id_number;
			$tenant->gender = $request->gender;
			$tenant->emergency_contact_name = $request->emergency_contact_name;
			$tenant->emergency_contact_relationship = $request->emergency_contact_relationship;
			$tenant->emergency_contact_phone = $request->emergency_contact_phone;
			$tenant->emergency_contact_email = $request->emergency_contact_email;
			$tenant->user_id = 1;
			$save =  $tenant->save();

			return redirect(route('tenant_add_form'))->with('status', 'Success, Tenant is successfully created');

		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show( $tenantID )
    {
        $tenant = DB::table( 'tenants' )->where( 'id' , $tenantID )->first();
		$data = [
			'tenant' => $tenant,
		];

		return view( 'backend.layout.tenant.show' , compact( 'data' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit( $tenantID )
    {
        $tenant = DB::table( 'tenants' )->where( 'id' , $tenantID )->first();

		$data = [
			'tenant' => $tenant
		];

		return view( 'backend.layout.tenant.edit' , compact( 'data' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTenantRequest  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantID )
    {
        $validator =  Validator::make($request->all(), [

			'name'     => 'required',
			'phone'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('tenant_edit',$tenantID))->with('status', 'Fail, Tenant is not updated');
		}
		else
		{
			$tenant = Tenant::find( $tenantID );

			$tenant->name = $request->name;
			$tenant->phone = $request->phone;
			$tenant->email = $request->email;
			$tenant->birth_date = $request->birth_date;
			$tenant->id_number = $request->id_number;
			$tenant->gender = $request->gender;
			$tenant->emergency_contact_name = $request->emergency_contact_name;
			$tenant->emergency_contact_relationship = $request->emergency_contact_relationship;
			$tenant->emergency_contact_phone = $request->emergency_contact_phone;
			$tenant->emergency_contact_email = $request->emergency_contact_email;
			$tenant->user_id = 1;

			$save =  $tenant->save();

			return redirect(route('tenant_edit',$tenantID))->with('status', 'Success, Tenant is Updated');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
