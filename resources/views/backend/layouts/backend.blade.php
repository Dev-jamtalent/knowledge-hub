<!doctype html>
<html lang="en">

<head>
	@include('backend.inc.header')
	<!--plugins-->
	@yield("style")
	@include('backend.inc.css')
    
</head>

<body   @yield('body')>
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    @include('backend.inc.navbar')
    
    
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

         <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('backend.inc.sidebar')

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            @yield('wrapper')
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @include('backend.inc.scripts')
    @yield("script")

</body>

</html>
