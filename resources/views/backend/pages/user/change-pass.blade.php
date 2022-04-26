@extends("fontend.layouts.fontend")
@section("change-pass")
active list-group-item d-flex justify-content-between align-items-center
@endsection
@section("other-change-pass")
list-group-item d-flex justify-content-between align-items-center bg-transparent
@endsection
@section("css")
 <!-- Icon Font CSS -->


	<link href="{{ asset('user') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<!-- Bootstrap CSS -->
	<link href="{{ asset('user') }}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('user') }}/assets/css/app.css" rel="stylesheet">
	<link href="{{ asset('user') }}/assets/css/icons.css" rel="stylesheet">
  @endsection  
@section("wrapper")
<b class="screen-overlay"></b>
<div class="page-wrapper">
	<div class="page-content">
		<!--start breadcrumb-->
		<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
			<div class="container">
				<div class="page-breadcrumb d-flex align-items-center">
					<h3 class="breadcrumb-title pe-3">My Orders</h3>
					<div class="ms-auto">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:;">My Account</a>
								</li>
								
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!--end breadcrumb-->
		<!--start shop cart-->
		<section class="py-4">
			<div class="container">
				<h3 class="d-none">Account</h3>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4">
								@include('fontend.inc.user-nav')
							</div>
							<div class="col-lg-8">
										<div class="card shadow-none mb-0 border">
											<div class="card-body">
												<form class="row g-3">
													
													<div class="col-12">
														<label class="form-label">Current Password</label>
														<input type="text" class="form-control" value="">
													</div>
													<div class="col-12">
														<label class="form-label">New Password</label>
														<input type="text" class="form-control" value="">
													</div>
													<div class="col-12">
														<label class="form-label">Confirm New Password</label>
														<input type="text" class="form-control" value="">
													</div>
													<div class="col-12">
														<button type="button" class="btn btn-dark btn-ecomm">Save Changes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</section>
		<!--end shop cart-->
	</div>
</div>
@endsection

@section("js")
 <!-- Icon Font CSS -->
	<script src="{{ asset('user') }}/assets/js/jquery.min.js"></script>
	<script src="{{ asset('user') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="{{ asset('user') }}/assets/js/app.js"></script>
  @endsection