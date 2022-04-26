<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>Circle Video | Searched Videos Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('fontend') }}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('fontend') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/assets/css/form-awesome.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/assets/css/font-circle-video.css" rel="stylesheet">

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>

</head>

<body class="channel light">
@include('fontend.inc.top-bar')

<!-- channel -->
<div class="container-fluid">
    <div class="row">
        <div class="img">
            <div class="img-image">
                <img src="{{ asset('fontend') }}/assets/images/channel-banner.png" alt="" class="c-banner">
            </div>
            <div class="c-avatar">
                <a href="#"><img src="{{asset($instructor->user->profile_photo_path)}}" alt=""></a>
            </div>
            <a href="#" class="add"><i class="cv cvicon-cv-plus"></i></a>
            <div class="c-social hidden-xs">
                Social
                <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tw"><i class="fa fa-twitter"></i></a>
                <a href="#" class="gp"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ///channel -->


<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="channel-details">
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-2 col-xs-12">
                            <div class="c-details">
                                <div class="c-name">
                                    {{$instructor->user->name}}
                                    <div class="c-checkbox">
                                        <img src="{{ asset('fontend') }}/assets/images/verified-profile-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="c-nav">
                                    <ul class="list-inline">
                                        <li><a href="#">Videos</a></li>
                                        <li><a href="#">Playlist</a></li>
                                        <li class="hidden-xs"><a href="#">Channels</a></li>
                                        <li class="hidden-xs"><a href="#">Discussion</a></li>
                                        <li class="hidden-xs"><a href="#">About</a></li>
                                        <li class="hidden-xs"><a href="#">Donate</a></li>
                                    </ul>
                                    <div class="btn-group dropup pull-right">
                                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Discussion <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="c-sub pull-right hidden-xs">
                                    <div class="c-sub-wrap">
                                        <div class="c-f">
                                            Subscribe
                                        </div>
                                        <div class="c-s">
                                            22,548,145
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Videos -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8 col-xs-6">
                                <div class="btn-group bg-clean">
                                        Videos 
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-4 col-xs-6">
                                <div class="h-grid pull-right hidden-xs">
                                    <a href="#"><i class="cv cvicon-cv-grid-view"></i></a>
                                    <a href="#"><i class="cv cvicon-cv-list-view"></i></a>
                                </div>
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Date Added ( Newest ) <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content">
                        <div class="row">
                            @forelse($instructor->videos as $video)
                            <div class=" col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('home.video.details',$video->slug)}}"><img src="{{ asset($video->image)}}" alt=""></a>
                                        
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('home.video.details',$video->slug)}}">{{$video->title}}</a>
                                    </div>
                                    <div class="v-views">
                                        {{$video->download}} Downloads. 
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- /Featured Videos -->
                <!-- Featured Videos -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-8 col-xs-6">
                                <div class="btn-group bg-clean">
                                    Books 
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-4 col-xs-6">
                                <div class="h-grid pull-right hidden-xs">
                                    <a href="#"><i class="cv cvicon-cv-grid-view"></i></a>
                                    <a href="#"><i class="cv cvicon-cv-list-view"></i></a>
                                </div>
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Date Added ( Newest ) <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content ">
                        <div class="row">
                            @forelse($instructor->books as $book)
                            <div class=" col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('home.book.details',$book->slug)}}"><img src="{{ asset($book->image)}}" alt=""></a>
                                        
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('home.book.details',$book->slug)}}">{{$book->title}}</a>
                                    </div>
                                    <div class="v-views">
                                        {{$book->download}} Downloads. 
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="container padding-def">
                <div class="row align-items-center">
                    <div class="col-xl-1 col-lg-1 col-md-12 footer-logo">
                        <!--<a class="navbar-brand" href="index.html"><img src="images/logo.svg" alt="Project name" class="logo" /></a>-->
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('fontend') }}/assets/images/logo.svg" alt="Project name" class="logo" />
                            <span>Circle</span>
                        </a>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="f-links">
                            <ul class="list-inline">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Copyright</a></li>
                                <li><a href="#">Advertise</a></li>
                                <li class="hidden-xs"><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <div class="delimiter"></div>
                        <div class="f-copy">
                            <ul class="list-inline">
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li>Copyrights 2016 <a href="azyrusthemes.com" class="hidden-xs">azyrusthemes.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 ml-auto col-xs-12">
                        <div class="f-last-line">
                            <div class="f-icon pull-left">
                                <a href="#"><i class="fa fa-facebook-square"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                            <div class="f-lang pull-right">
                                <!-- Small button group -->
                                <div class="btn-group dropup pull-right">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Language <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="delimiter visible-xs"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('fontend') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/jquery-migrate-1.4.1.min.js"></script>
<script src="{{ asset('fontend') }}/assets/bootstrap/js/popper.js"></script>
<script src="{{ asset('fontend') }}/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/custom.js"></script>

</body>
</html>
