
@extends("fontend.layouts.fontend")
@section("wrapper")
<div class="container-fluid bg-image">
    <div class="row">
        <div class="login-wraper">
            <div class="hidden-xs">
                <img src="{{ asset('fontend') }}/assets/images/login.jpg" alt="">
            </div>
            <div class="banner-text hidden-xs">
                <div class="line"></div>
                <div class="b-text">
                    Watch <span class="color-active">millions<br> of</span> <span class="color-b1">Kno</span><span class="color-b2">w</span><span class="color-b3">ledge</span><span class="color-active">os</span> for free.
                </div>
                <div class="overtext">
                    Over 6000 videos uploaded Daily.
                </div>
            </div>
            <div class="login-window">
                <div class="l-head">
                    Sign Up for Free
                </div>
                <div class="l-form">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password"  name="password" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-type Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" >
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Sign Up</button></div>
                            <div class="hidden-xs col-lg-5 d-flex">
                                <div class="ortext">or</div>
                                <div class="signuptext"><a href="{{route('user.login')}}">Log In</a></div>
                            </div>
                        </div>
                        <div class="row hidden-xs">
                            <div class="col-lg-12 forgottext">
                                <a href="#">By clicking "Sign Up" I agree to Knowledge hub Terms of Service.</a>
                            </div>
                        </div>
                        <div class="visible-xs text-center mt-30">
                            <span class="forgottext"><a href="{{route('user.login')}}">Already have an account?</a></span>
                            <span class="signuptext"><a href="{{route('user.login')}}">Login here</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection