<div class="card shadow-none mb-3 mb-lg-0 border rounded-0">
	<div class="card-body">
		<div class="list-group list-group-flush">	
			<a href="{{route('user.dashboard')}}" class="list-group-item @yield('dashboard') d-flex justify-content-between align-items-center">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
			<!-- <a href="" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a> -->
			<a href="" class="@yield('other-change-pass') @yield('other-dashboard') @yield('other-acc-details')">Download Books <i class='bx bx-download fs-5'></i></a>
			<a href="" class="@yield('other-change-pass') @yield('other-dashboard') @yield('other-acc-details')">Download Video <i class='bx bx-download fs-5'></i></a>

			<a href="" class="@yield('other-change-pass') @yield('other-dashboard') @yield('other-acc-details')">Addresses <i class='bx bx-home-smile fs-5'></i></a>
			<a href="" class="@yield('other-change-pass') @yield('other-dashboard') @yield('other-acc-details')">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
			<a href="{{route('user.details')}}" class="@yield('accout-details') @yield('other-change-pass') @yield('other-dashboard') ">Account Details <i class='bx bx-user-circle fs-5'></i></a>
			<a href="{{route('user.change.password')}}" class="@yield('change-pass') @yield('other-dashboard') @yield('other-acc-details')">Change Password <i class='bx bx-user-circle fs-5'></i></a>
			<a href="{{ route('logout') }}"onclick="event.preventDefault();
	         document.getElementById('logout-form').submit();" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i>
	     	</a>
	         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	            @csrf
	        </form>
		</div>
	</div>
</div>