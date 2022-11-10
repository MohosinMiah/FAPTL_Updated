@extends('backend.home')

@section('js')

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h3 class="text text-info">Pending Payment List</h3>
			<a href="{{ route('payment_list') }}" class="btn btn-primary marginBottom">Payment Report</a>
		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			{{--  Property List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tenant Name</th>
									<th>Property Name</th>
									<th>Property Unit</th>
									<th>Payment Amount</th>
									<th>Payment Date</th>
									<th>Status</th>
									<th>Purpose</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Tenant Name</th>
									<th>Property Name</th>
									<th>Property Unit</th>
									<th>Payment Amount</th>
									<th>Payment Date</th>
									<th>Status</th>
									<th>Purpose</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['payments'] as $payment )

								<?php 
								$tenant         = DB::table( 'tenants' )->where( 'id' , $payment->tenant_id )->first();
								$property       = DB::table( 'properties' )->where( 'id' , $payment->property_id  )->first();
								$property_unite = DB::table( 'property_unities' )->where( 'id' , $payment->unit_id  )->first();
								?>
									<tr>
										<td>{{ $payment->id }}</td>
										<td>{{ $tenant->name }}</td>
										<td>
											<?php
												if( $property )
												{
													echo $property->name;
												}
												else
												{
													echo '';
												}
											?>
										</td>
										<td>
											<?php
											if( $property_unite )
											{
												echo $property_unite->name;
											}
											else
											{
												echo '';
											}
										?>
										</td>
										<td>$ {{ $payment->payment_amount }}</td>
										<td>{{ $payment->payment_date }}</td>
										<td>
											<?php
												if( $payment->payment_purpose == 1)
												{
											
													echo 'Rent';
												}
												elseif( $payment->payment_purpose == 2 )
												{
													echo 'Prorated Rent';
												}
												elseif( $payment->payment_purpose == 3 )
												{
													echo 'Security Deposit';

												}
												elseif( $payment->payment_purpose == 4 )
												{
													echo 'Damage';

												}
												elseif( $payment->payment_purpose == 5 )
												{
													echo 'Other';
												}
											?>
										</td>
										<td>
											<?php

												if( $payment->payment_status == 1)
												{
											
													echo 'PENDING';
												}
												elseif( $payment->payment_status == 2 )
												{
													echo 'RECORDED';
												}
												elseif( $payment->payment_status == 3 )
												{
													echo 'DEPOSITED';

												}
											
											?>
										</td>
										<td>
											<a class="btn btn-xs btn-danger" href="{{ route('pending_status_change', $payment->id) }}" onclick="return confirm('Are You Agree To Change Payment Status Pending To Recorded')"><i class="fa fa-rocket"  title="Change Status Pending To Recorded"></i></a>
											<a class="btn btn-xs btn-info" href="{{ route('payment_show', $payment->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('payment_edit', $payment->id) }}"><i class="fa fa-edit"></i></a>
										</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  Property List  Start   --}}

		</div>
	</div>

</div>

@endsection
