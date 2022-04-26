@extends("fontend.layouts.fontend")
@section("dashboard")
active
@endsection
@section("other-dashboard")
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
								<div class="card shadow-none mb-0">
									<div class="card-body">
										<p>Hello <strong>Madison Ruiz</strong> (not <strong>Madison Ruiz?</strong>  <a href="javascript:;">Logout</a>)</p>
										<p>From your account dashboard you can view your Recent Orders, manage your shipping and billing addesses and edit your password and account details</p>
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