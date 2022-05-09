<!DOCTYPE html>
<html>
<head>
	@include('fontend.inc.header')
	@include('fontend.inc.css')
	@yield("css")
</head>
<body class="light @yield('single-video')">
	@include('fontend.inc.top-bar')
	@yield("wrapper")
	@include('fontend.inc.footer')
	@include('fontend.inc.script')
	@yield("js")
</body>
</html>