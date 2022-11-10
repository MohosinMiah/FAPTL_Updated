<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\PropertyUnit;
// use App\Http\Requests\StorePaymentRequest;
// use App\Http\Requests\UpdatePaymentRequest;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;

class PaymentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$payments = Payment::all();
		$tenants = Tenant::all();
		$properties = Property::all();
		$data = [
			'payments' => $payments,
			'tenants' => $tenants,
			'properties' => $properties,

		];
		return view('backend.layout.payment.index',compact('data'));

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function pending_index()
	{
		$payments = Payment::where( 'payment_status', 1 )->get();
		$tenants = Tenant::all();
		$properties = Property::all();
		$data = [
			'payments' => $payments,
			'tenants' => $tenants,
			'properties' => $properties,

		];
		return view( 'backend.layout.payment.pending_index', compact('data') );

	}


	/**
	 * @param Request $request
	 * Payment Status Changed Pending to Recorded
	 */

	public function statusRecorded( $payment_id )
	{
		$update_payment_status = Payment::where( 'id', $payment_id )->where( 'payment_status' , '=', '1' )->update([
			'payment_status' => '2'
		]);

		return redirect(route('payment_list_pending'));
	}


	/**
	 * @param Request $request
	 * Payment Status Changed Recorded to Deposited
	 */

	public function statusDeposited( $payment_id )
	{
		$update_payment_status = Payment::where( 'id', $payment_id )->where( 'payment_status' , '=', '2' )->update([
			'payment_status' => '3'
		]);

		return redirect(route('payment_list_recorded'));
	}

	
	/**
	 * @param Request $request
	 * Payment Status Changed Mark All Recorded to Deposited
	 */
	
	public function mark_all_deposited(  )
	{
		$update_payment_status = Payment::where( 'payment_status' , '=', '2' )->update([
		'payment_status' => '3'
		]);

		return redirect(route('payment_list_recorded'));
		
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function recorded_index()
	{
		$payments = Payment::where( 'payment_status', 2 )->get();
		$tenants = Tenant::all();
		$properties = Property::all();
		$data = [
			'payments' => $payments,
			'tenants' => $tenants,
			'properties' => $properties,

		];
		return view('backend.layout.payment.recorded_index',compact('data'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tenants    = Tenant::all();
		$properties = Property::all();
		$data = [
			'tenants' => $tenants,
			'properties' => $properties,
		];
		return view('backend.layout.payment.add',compact('data'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StorePaymentRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request)
	{
		$validator =  Validator::make( $request->all(), [
			// 'name'     => 'required',
			// 'phone'     => 'required',
		]);

		if( $validator->fails() )
		{
			return redirect(route('payment_add_form'))->with('status', 'Fail, Payment is not created');
		}
		else
		{
			$payment = new Payment();

			$payment->tenant_id = $request->tenant_id;
			$payment->property_id = $request->property_id;
			$payment->unit_id = $request->unit_id;
			$payment->payment_amount = $request->payment_amount;
			$payment->payment_date	 = $request->payment_date	;
			$payment->payment_purpose = $request->payment_purpose;
			$payment->payment_status = $request->payment_status;
			$payment->note = $request->note;
			$payment->user_id = 1;
			$save =  $payment->save();

			return redirect(route('payment_add_form'))->with('status', 'Success, Payment is successfully created');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function show(Payment $payment)
	{
		$payment = DB::table( 'payments' )->where( 'id' , $paymentID )->first();
		$tenants = Tenant::all();
		$properties = Property::all();
		$propertyUnits = DB::table( 'property_unities' )->where( 'property_id' , $payment->property_id )->get();

		$data = [
			'tenants' => $tenants,
			'properties' => $properties,
			'propertyUnits' => $propertyUnits,
			'payment' => $payment,

		];
		return view( 'backend.layout.payment.show' , compact( 'data' ) );

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $paymentID )
	{
		$tenants = Tenant::all();
		$payment = DB::table( 'payments' )->where( 'id' , $paymentID )->first();
		$property  = DB::table( 'properties' )->select( 'id', 'name' )->where( 'id' , $payment->property_id  )->first();
		$property_unite = DB::table( 'property_unities' )->select( 'id', 'name' )->where( 'id' , $payment->unit_id  )->first();
		$data = [
			'tenants' => $tenants,
			'payment' => $payment,
			'property' => $property,
			'property_unite' => $property_unite,
		];



		return view( 'backend.layout.payment.edit' , compact( 'data' ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdatePaymentRequest  $request
	 * @param  \App\Models\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $paymentID )
	{
		$validator =  Validator::make($request->all(), [
			// 'name'     => 'required',
			// 'phone'     => 'required',
		]);

		if( $validator->fails() )
		{
			return redirect(route('payment_edit',$paymentID))->with('status', 'Fail, Payment is not updated');
		}
		else
		{
			$payment =  Payment::find( $paymentID );

			$payment->tenant_id = $request->tenant_id;
			$payment->property_id = $request->property_id;
			$payment->unit_id = $request->unit_id;
			$payment->payment_amount = $request->payment_amount;
			$payment->payment_date	 = $request->payment_date	;
			$payment->payment_purpose = $request->payment_purpose;
			$payment->payment_status = $request->payment_status;
			$payment->note = $request->note;
			$payment->user_id = 1;
			$save =  $payment->save();

			return redirect(route('payment_edit',$paymentID))->with('status', 'Success, Payment is Updated');
		}
	}




	public function lease_by_tenant_id( $tenantID )
	{
		
		$lease = DB::table('leases')->where( 'tenant_id' , $tenantID )->orderBy('id', 'DESC')->first();
		if( !empty( $lease )   &&  $lease->isActive == 1 )
		{
			$property = DB::table('properties')->where( 'id' , $lease->property_id )->first();
			$propertyunit = DB::table('property_unities')->where( 'id' , $lease->unit_id )->first();

			$data['property_id'] = $property->id;
			$data['property_name'] = $property->name;

			$data['propertyunit_id'] = $propertyunit->id;
			$data['propertyunit_name'] = $propertyunit->name;

			$data['rentamount'] = $lease->rent_amount;
	
			return response()->json($data); 

		}
		else
		{
			$data['error'] = 'Data Not Found';
			return response()->json($data); 
		}

	}


	public function payment_filter( Request $request )
	{
		$payments = DB::table('payments')->select('*');

		$tenant_id = $request->tenant_id;
		if( !empty( $tenant_id ) || $tenant_id != NUll  || $tenant_id != '' )
		{
			$payments->where( 'tenant_id', $tenant_id );
		}

		$propertyUnit = [];
		$property_id         =  ( isset( $request->property_id ) )  ? $request->property_id : $_GET['property_id'];
		if( !empty( $property_id ) || $property_id != NUll  || $property_id != '' )
		{
			$payments->where('property_id', $property_id);

			$propertyUnit = DB::table('property_unities')->where( 'property_id' , $property_id )->get();
		}



		
		$unit_id             =  $request->unit_id;


		if( !empty( $unit_id ) || $unit_id != NUll  || $unit_id != '' )
		{
			$payments->where('unit_id', $unit_id);
		}




		$payment_status = $request->payment_status;
		if( !empty( $payment_status ) || $payment_status != NUll  || $payment_status != '' )
		{
			$payments->where('payment_status', $payment_status);
		}


		$paymentStartDate     =  $request->start_date;
		$paymentEndDate       =  $request->end_date;

		if( !empty( $paymentStartDate ) || $paymentStartDate != NUll || $paymentStartDate != null || $paymentStartDate != '' )
		{	
			$payments->where('payment_date', '>=', $paymentStartDate);
		}


		if( !empty( $paymentEndDate ) || $paymentEndDate != NUll || $paymentEndDate != null || $paymentEndDate != '' )
		{
			$payments->where('payment_date', '<=', $paymentEndDate);
		}


		$tenants = Tenant::all();
		$properties = Property::all();
		$data = [
			'payments' => $payments->get(),
			'tenants' => $tenants,
			'properties' => $properties,
			'propertyUnit' => $propertyUnit

		];
		return view('backend.layout.payment.index',compact('data'));
	}


	/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Models\Payment  $payment
		* @return \Illuminate\Http\Response
		*/
	public function destroy(Payment $payment)
	{
		//
	}
}
