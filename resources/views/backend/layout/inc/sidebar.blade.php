<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">
			<?php
				if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) )
				{
					echo '<strong>' . session( 'name' ) . '</strong>';
				}
			?>
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="/">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Pages Collapse Menu -->

	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Property</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="{{ route('property_add_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('property_list') }}">List</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
			aria-controls="collapseThree">
			<i class="fas fa-fw fa-cog"></i>
			<span>Property Unit</span>
		</a>
		<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="{{ route('property_unit_list') }}">List</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
			aria-controls="collapseFour">
			<i class="fas fa-fw fa-cog"></i>
			<span>Tenant</span>
		</a>
		<div id="collapseFour" class="collapse" aria-labelledby="headingFour"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="{{ route('tenant_add_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('tenant_list') }}">List</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
			aria-controls="collapseFive">
			<i class="fas fa-fw fa-cog"></i>
			<span>Lease</span>
		</a>
		<div id="collapseFive" class="collapse" aria-labelledby="headingFive"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="{{ route('lease_add_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('lease_list') }}">List</a>
			</div>
		</div>
	</li>


	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
