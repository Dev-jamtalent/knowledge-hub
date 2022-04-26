@extends("backend.layouts.backend")


@section("style")
	
        <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/dropify/dropify.min.css">
    <link href="{{ asset('backend') }}/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section("body")
	data-spy="scroll" data-target="#navSection" data-offset="140"
@endsection
@section("wrapper")
       <!--  BEGIN CONTENT AREA  -->
        
            <div class="layout-px-spacing">                
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" class="section general-info"action="{{route('user.update.details')}}" method="POST" enctype="multipart/form-data">
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right mb-5">
                                                                <input type="submit" class="btn btn-primary submit-fn mt-2" value="Update" name="">
                                                                    
                                                                    
                                                                </div>
                                                            @csrf
                                                            
                                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                                <div class="upload mt-4 pr-md-4">
                                                                    <input type="file" id="input-file-max-fs" name="image" class="dropify" data-default-file={{asset(Auth::user()->profile_photo_path)}} data-max-file-size="2M" />
                                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                                <div class="form">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="fullName">Full Name</label>
                                                                                <input type="text"  class="form-control mb-4" id="name" name="name" placeholder="Full Name" value="{{Auth::user()->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="dob-input">Date of Birth</label>
                                                                            <div class="d-sm-flex d-block">
                                                                                <div class="form-group mr-1">
                                                                                    <select class="form-control" id="day" name="birth_date">
                                                                                      <option>Day</option>
                                                                                      <option>1</option>
                                                                                      <option>2</option>
                                                                                      <option>3</option>
                                                                                      <option>4</option>
                                                                                      <option>5</option>
                                                                                      <option>6</option>
                                                                                      <option>7</option>
                                                                                      <option>8</option>
                                                                                      <option>9</option>
                                                                                      <option>10</option>
                                                                                      <option>11</option>
                                                                                      <option>12</option>
                                                                                      <option>13</option>
                                                                                      <option>14</option>
                                                                                      <option>15</option>
                                                                                      <option>16</option>
                                                                                      <option>17</option>
                                                                                      <option>18</option>
                                                                                      <option>19</option>
                                                                                      <option selected>20</option>
                                                                                      <option>21</option>
                                                                                      <option>22</option>
                                                                                      <option>23</option>
                                                                                      <option>24</option>
                                                                                      <option>25</option>
                                                                                      <option>26</option>
                                                                                      <option>27</option>
                                                                                      <option>28</option>
                                                                                      <option>29</option>
                                                                                      <option>30</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group mr-1">
                                                                                    <select class="form-control" id="month" name="birth_month">
                                                                                        <option>Month</option>
                                                                                        <option value="Jan" selected>Jan</option>
                                                                                        <option value="Feb">Feb</option>
                                                                                        <option value="Mar">Mar</option>
                                                                                        <option value="Apr">Apr</option>
                                                                                        <option value="May">May</option>
                                                                                        <option value="Jun">Jun</option>
                                                                                        <option value="Jul">Jul</option>
                                                                                        <option value="Aug">Aug</option>
                                                                                        <option value="Sep">Sep</option>
                                                                                        <option value="Oct">Oct</option>
                                                                                        <option value="Nov">Nov</option>
                                                                                        <option value="Dec">Dec</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group mr-1">
                                                                                    <select class="form-control" id="year" name="birth_year">
                                                                                      <option value ="2018">Year</option 
                                                                                      >
                                                                                      <option value ="2018"> 2018</option>
                                                                                      <option value ="2017">2017</option>
                                                                                      <option value ="2018">2016</option>
                                                                                      <option value ="2015">2015</option>
                                                                                      <option value ="2014">2014</option>
                                                                                      <option value ="2013"> 2013</option>
                                                                                      <option value ="2012">2012</option>
                                                                                      <option value ="2011">2011</option>
                                                                                      
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
 
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                            <label for="profession">Title</label>
                                                                            <select class="form-control" id="gander" name="gender">
                                                                                <option >Title</option>
                                                                                <option value="1">Mr</option>
                                                                                <option value="2">Mrs</option>
                                                                                <option value="3">Miss</option>
                                                                                <option value="4">Dr</option>
                                                                                <option value="5">Professor</option>
                                                                                <option value="6">Engineer</option>
                                                                            </select>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                            <label for="profession">Gander</label>
                                                                            <select class="form-control" id="gander" name="gender">
                                                                                      <option value="1">Male</option>
                                                                                      <option value="2">Female</option>
                                                                                      

                                                                                    </select>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="about" class="section about">
                                        <div class="info">
                                            <h5 class="">About</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="form-group">
                                                        <label for="aboutBio">Bio</label>
                                                        <textarea class="form-control" id="aboutBio" placeholder="Tell something interesting about yourself" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="work-platforms" class="section work-platforms">
                                        <div class="info">
                                            <h5 class="">Work Platforms</h5>
                                            <div class="row">
                                                <div class="col-md-12 text-right mb-5">
                                                    <button id="add-work-platforms" class="btn btn-primary">Add</button>
                                                </div>
                                                <div class="col-md-11 mx-auto">

                                                    <div class="platform-div">
                                                        <div class="form-group">
                                                            <label for="platform-title">Platforms Title</label>
                                                            <input type="text" class="form-control mb-4" id="platform-title" placeholder="Platforms Title" value="Web Design" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="platform-description">Description</label>
                                                            <textarea class="form-control mb-4" id="platform-description" placeholder="Platforms Description" rows="10">Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</textarea>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    
                                        <div class="info">
                                            <h5 class="">Contact</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select class="form-control" id="country">
                                                                    <option>All Countries</option>
                                                                    <option selected>United States</option>
                                                                    <option>India</option>
                                                                    <option>Japan</option>
                                                                    <option>China</option>
                                                                    <option>Brazil</option>
                                                                    <option>Norway</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" class="form-control mb-4" id="address" placeholder="Address" value="New York" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" class="form-control mb-4" id="location" placeholder="Location">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="+1 (530) 555-12121">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control mb-4" id="email" placeholder="Write your email here" value="Jimmy@gmail.com">
                                                            </div>
                                                        </div>                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1">Website</label>
                                                                <input type="text" class="form-control mb-4" id="website1" placeholder="Write your website here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    
                                        <div class="info">
                                            <h5 class="">Social</h5>
                                            <div class="row">

                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-linkedin mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="linkedin Username" aria-label="Username" aria-describedby="linkedin" value="jimmy_turner">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group social-tweet mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Twitter Username" aria-label="Username" aria-describedby="tweet" value="@jTurner">
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-fb mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Facebook Username" aria-label="Username" aria-describedby="fb" value="Jimmy Turner">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group social-github mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="github"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Github Username" aria-label="Username" aria-describedby="github" value="@TurnerJimmy">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>

            </div>
        
        <!--  END CONTENT AREA  -->
@endsection

@section("script")

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{ asset('backend') }}/plugins/dropify/dropify.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('backend') }}/assets/js/users/account-settings.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    
    
@endsection