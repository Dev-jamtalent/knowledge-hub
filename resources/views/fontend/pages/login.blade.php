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
                    Over 6000 uploaded Daily.
                </div>
            </div>
            <div class="login-window">
                <div class="l-head">
                    Log Into Your Knowledge Hub Account
                </div>
                <div class="l-form">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <label class="checkbox">
                                    <input type="checkbox" name="#">
                                    <span class="arrow"></span>
                                </label> <span>Remember me on this computer</span>
                                <span class="text2">(not recomended on public or shared computers)</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Login</button></div>
                            <div class="hidden-xs col-lg-5 d-flex">
                                <div class="ortext">or</div>
                                <div class="signuptext"><a href="signup.html">Sign Up</a></div>
                            </div>
                        </div>
                        <div class="row hidden-xs">
                            <div class="col-lg-12 forgottext">
                                <a href="#">Forgot Username or Password?</a>
                            </div>
                        </div>
                        <div class="row visible-xs">
                            <div class="col-xs-6">
                                <div class="forgottext"><a href="#">Forgot Password?</a></div>
                            </div>
                            <div class="col-xs-6"><div class="signuptext text-right"><a href="signup.html">Sign Up</a></div></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection