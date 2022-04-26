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

    <title>Circle Video | Single video</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('fontend') }}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- player -->
    <link rel="stylesheet" href="{{ asset('fontend') }}/assets/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css" />

    <!-- Theme CSS -->
    <link href="{{ asset('fontend') }}/assets/js/vendor/magnificPopup/dist/magnific-popup.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/assets/css/style.css" rel="stylesheet">

    <link href="{{ asset('fontend') }}/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/assets/css/font-circle-video.css" rel="stylesheet">

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="single-video light">

@php
$instructor = App\Models\Instructor::where('id',$book->instructor_id)->first();
$bookCount = App\Models\Book::where('id',$book->instructor_id)->count();
@endphp
@include('fontend.inc.top-bar')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="sv-video">
                    <img src="{{ asset($book->image) }}" class="img-fluid"style="width:100%;height:100%;"  width="100%" height="100%" >
                    <!-- <video poster="{{ asset($book->image) }}" style="width:100%;height:100%;" controls="controls" width="100%" height="100%">
                        <source src="{{ asset('fontend') }}/assets/videos/video-1.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
                    </video> -->
                    <!-- <span class="sv-play"><i class="cv cvicon-cv-play"></i></span> -->
                </div>
                <h1><a href="#">{{$book->title}}</a></h1>
                <div class="acide-panel acide-panel-top">
                    <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                    <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                    <a href="#"><i class="cv cvicon-cv-flag" data-toggle="tooltip" data-placement="top" title="Flag"></i></a>
                </div>
                <div class="author">
                    <div class="author-head">
                        <a href="#"><img src="{{ asset($instructor->user->profile_photo_path) }}" alt="" class="sv-avatar"></a>
                        <div class="sv-name">
                            <div><a href="{{route('instructor.show',$instructor->id)}}">{{$instructor->user->name}}</a> </div>
                            <div class="c-sub hidden-xs">
                                <div class="c-f">
                                   Like
                                </div>
                                <div class="c-s">
                                    22,548,145
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <a href="#" class="author-btn-add"><i class="cv cvicon-cv-plus"></i></a>
                    </div>
                    <div class="author-border"></div>
                    <div class="sv-views">
                        <div class="sv-views-count">
                            <div class="sv-views-stats">
                            <!-- <span class="percent">Videos</span>
                            <span class="green"><span class=""></span> 39,852</span> -->
                            
                        </div>
                        </div>
                        <!-- <div class="sv-views-progress">
                            <div class="sv-views-progress-bar"></div>
                        </div> -->
                        <div class="sv-views-stats">
                            <span class="green"><span class=""></span> 39,852</span>
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="info">
                    <div class="custom-tabs">
                        <div class="tabs-panel">
                            <a href="#" class="active" data-tab="tab-1">
                                <i class="cv cvicon-cv-about" data-toggle="tooltip" data-placement="top" title="About"></i>
                                <span>About</span>
                            </a>
                            <a href="#" data-tab="tab-2">
                                <i class="cv cvicon-cv-share" data-toggle="tooltip" data-placement="top" title="Share"></i>
                                <span>Share</span>
                            </a>
                            <a href="{{route('book.download',$book->slug)}}" data-tab="tab-3">
                                <i class="cv cvicon-cv-download" data-toggle="tooltip" data-placement="top" title="Download"></i>
                                <span>Download</span>
                            </a>
                            
                            <a href="#" data-tab="tab-5">
                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to"></i>
                                <span>Add to</span>
                            </a>
                            <div class="acide-panel hidden-xs">
                                 
                                 <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                                 
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <!-- BEGIN tabs-content -->
                        <div class="tabs-content">
                            <!-- BEGIN tab-1 -->
                            <div class="tab-1">
                                <div>
                                    

                                    <h4>Category :</h4>
                                    <p>
                                    
                                    </p>

                                    <h4>About :</h4>
                                    <p>{!!$book->description!!}</p>

                                    <h4>Tags :</h4>
                                    <p class="sv-tags">
                                        @foreach($book->bookTags as $tag)
                                        <span><a href="#">{{$tag->tag_name}}</a></span>
                                        @endforeach
                                    </p>

                                    <div class="row date-lic">
                                        <div class="col-xs-6">
                                            <h4>Release Date:</h4>
                                            <p>{{$book->created_at->diffForHumans()}}</p>
                                        </div>
                                        <!-- <div class="col-xs-6 ta-r">
                                            <h4>License:</h4>
                                            <p>Standard</p>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div class="hidden-xs">
                                    <h4>Game:</h4>
                                    <p>Uncharted 4</p>
                                    <a href="#">
                                        <img src="{{ asset('fontend') }}/assets/images/tab-1-img-1.jpg" alt="image">
                                    </a>
                                    <a href="#" class="btn">Purchase</a>
                                </div> -->
                                <div class="clearfix"></div>
                                <!-- <div class="showless hidden-xs">
                                    <a href="#">Show Less</a>
                                </div> -->
                            </div>
                            <!-- END tab-1 -->

                            <!-- BEGIN tab-2 -->
                            <div class="tab-2">
                                <h4>Share:</h4>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a href="#" class="btc"><i class="fa fa-btc" aria-hidden="true"></i></a>
                                    <a href="#" class="tumblr"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                                    <a href="#" class="vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                    <a href="#" class="reddit"><i class="fa fa-reddit" aria-hidden="true"></i></a>
                                    <a href="#" class="stumbleupon"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a>
                                    <a href="#" class="odnoklassniki"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                                    <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a href="#" class="btc"><i class="fa fa-btc" aria-hidden="true"></i></a>
                                    <a href="#" class="tumblr"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                                    <a href="#" class="vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                    <a href="#" class="reddit"><i class="fa fa-reddit" aria-hidden="true"></i></a>
                                    <a href="#" class="stumbleupon"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a>
                                    <a href="#" class="odnoklassniki"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4>Link:</h4>
                                        <label class="clipboard">
                                            <input type="text" name="#" class="share-link" value="http://youtu.be/DwGgdfe-C6c" readonly>
                                            <div class="btn-copy" data-clipboard-target=".share-link">Copy</div>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Start at:</h4>
                                        <label class="checkbox">
                                            <input type="checkbox" name="#">
                                            <span class="arrow"></span>
                                        </label>
                                        <input type="text" name="#" value="3:20" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Embed:</h4>
                                        <textarea type="text" name="#" readonly><iframe width="560" height="315" src="https://www.circle.com/embed/ZocVTdsercgvsd3nA3JM?controls=0" frameborder="0" allowfullscreen></iframe></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Video Size:</h4>
                                        <div class="tags-type1">
                                            <a href="#">360P</a>
                                            <a href="#">480P</a>
                                            <a href="#">720P</a>
                                            <a href="#">1080P</a>
                                            <a href="#">Custom</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="checkbox-text">
                                            <label class="checkbox">
                                                <input type="checkbox" name="#">
                                                <span class="arrow"></span>
                                            </label>
                                            <p>Show suggested videos when the video finishes</p>
                                        </label>
                                        <label class="checkbox-text">
                                            <label class="checkbox">
                                                <input type="checkbox" name="#">
                                                <span class="arrow"></span>
                                            </label>
                                            <p>Show player controls</p>
                                        </label>
                                        <label class="checkbox-text">
                                            <label class="checkbox">
                                                <input type="checkbox" name="#">
                                                <span class="arrow"></span>
                                            </label>
                                            <p>Show video title and player actions</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="tab-popup popup-share">
                                    <div class="tab-popup-head">
                                        <i class="cv cvicon-cv-share"></i>
                                        <span>Share this video</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <h4>Copy Link:</h4>
                                        <label class="clipboard">
                                            <input type="text" name="#" class="share-link" value="http://youtu.be/DwGgdfe-C6c" readonly>
                                            <div class="btn-copy" data-clipboard-target=".share-link">Copy</div>
                                        </label>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="popup-share-social">
                                            <a href="#" class="facebook">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                                <span>Facebook</span>
                                            </a>
                                            <a href="#" class="twitter">
                                                <i class="fa fa fa-twitter" aria-hidden="true"></i>
                                                <span>Twitter</span>
                                            </a>
                                            <a href="#" class="google">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                <span>Google Plus</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-2 -->

                            <!-- BEGIN tab-3 -->
                            <div class="tab-3">
                                <h4>Download:</h4>
                                <div class="tags-type2">
                                    <a href="{{route('book.download',$book->slug)}}"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>PDF</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>WORD</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>PNG</a>
                                </div>
                                <label class="checkbox-text">
            
                                    <p>By Downloading this Book I agree that I will not upload this Book anywhere else without proper permission from the creator.</p>
                                </label>
                                
                            </div>
                            <!-- END tab-3 -->

                            <!-- BEGIN tab-4 -->
                            <div class="tab-4">
                                <h4>Jump to:</h4>
                                <div class="block-list">
                                    <div>
                                        <span class="name">Introduction</span>
                                        <span class="time">0:00 - 2:16</span>
                                    </div>
                                    <div>
                                        <span class="name">Gameplay</span>
                                        <span class="time">2:17 - 3:19</span>
                                    </div>
                                    <div class="active">
                                        <span class="name">Cut Scene</span>
                                        <span class="time">3:20 - 8:33</span>
                                    </div>
                                    <div>
                                        <span class="name">Review</span>
                                        <span class="time">8:34 - 9:27</span>
                                    </div>
                                    <div>
                                        <span class="name">Overall Rating</span>
                                        <span class="time">9:28 - 11:06</span>
                                    </div>
                                </div>
                                <div class="tab-popup popup-jump">
                                    <div class="tab-popup-head">
                                        <i class="cv cv cvicon-cv-goto"></i>
                                        <span>Jump to</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="block-list">
                                            <div>
                                                <span class="name">Introduction</span>
                                                <span class="time">0:00 - 2:16</span>
                                            </div>
                                            <div>
                                                <span class="name">Gameplay</span>
                                                <span class="time">2:17 - 3:19</span>
                                            </div>
                                            <div class="active">
                                                <span class="name">Cut Scene</span>
                                                <span class="time">3:20 - 8:33</span>
                                            </div>
                                            <div>
                                                <span class="name">Review</span>
                                                <span class="time">8:34 - 9:27</span>
                                            </div>
                                            <div>
                                                <span class="name">Overall Rating</span>
                                                <span class="time">9:28 - 11:06</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-4 -->

                            <!-- BEGIN tab-5 -->
                            <div class="tab-5">
                                <h4>Add to Playlist:</h4>
                                <div class="block-list">
                                    <div>
                                        <i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i>
                                        <span class="name">Watch Later</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div>
                                        <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                        <span class="name">Gameplay Playlist</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div class="active">
                                        <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                        <span class="name">Review Videos</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div>
                                        <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                        <span class="name">Tech Updates</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div>
                                        <i class="cv cvicon-cv-add-to-playlist" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                        <span class="name">Create New Playlist</span>
                                    </div>
                                </div>
                                <div class="tab-popup popup-add">
                                    <div class="tab-popup-head">
                                        <i class="cv cvicon-cv-plus"></i>
                                        <span>Add to</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="block-list">
                                            <div>
                                                <i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i>
                                                <span class="name">Watch Later</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div>
                                                <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                                <span class="name">Gameplay Playlist</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div class="active">
                                                <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                                <span class="name">Review Videos</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div>
                                                <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                                <span class="name">Tech Updates</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div>
                                                <i class="cv cvicon-cv-add-to-playlist" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                                <span class="name">Create New Playlist</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-5 -->
                        </div>
                        <!-- END tabs-content -->
                    </div>

                    <div class="content-block head-div head-arrow head-arrow-top visible-xs">
                        <div class="head-arrow-icon">
                            <i class="cv cvicon-cv-next"></i>
                        </div>
                    </div>

                    <div class="adblock2">
                        <div class="img">
                            <span class="hidden-xs">
                                Google AdSense<br>728 x 90
                            </span>
                            <span class="visible-xs">
                                Google AdSense 320 x 50
                            </span>
                        </div>
                    </div>

                    <!-- similar videos -->
                    <div class="caption hidden-xs">
                        <div class="left">
                            <a href="#">Similar Books</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-v-footer">
                        <div class="single-v-footer-switch">
                            <a href="#" class="active" data-toggle=".similar-v">
                                <i class="cv cvicon-cv-play-circle"></i>
                                <span>Similar Books</span>
                            </a>
                            <a href="#" data-toggle=".comments">
                                <i class="cv cvicon-cv-comment"></i>
                                <span>236 Comments</span>
                            </a>
                        </div>
                        <div class="similar-v single-video video-mobile-02">
                            <div class="row">
                                @forelse(App\Models\Book::where('title', 'LIKE' ,$book->title)->where('id', '!=' ,$book->id)->get()->take(3) as $insBook)
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="h-video row">
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-img">
                                                <a href="{{route('home.book.details',$insBook->slug)}}"><img src="{{asset($insBook->image)}}" alt=""></a>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-6">
                                            <div class="v-desc">
                                                <a href="{{route('home.book.details',$insBook->slug)}}">{{$insBook->title}}</a>
                                            </div>
                                            <div class="v-views">
                                                Free
                                            </div>
                                            <div class="v-views"> <span style="color: blue;">{{$insBook->download}} Download</span> </div>
                                        </div>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                                
                            </div>
                        </div>
                        <!-- END similar videos -->

                        <!-- comments -->
                        <div class="comments">
                            <div class="reply-comment">
                                <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold">236</span> Comments</div>
                                <div class="rc-ava"><a href="#"><img src="images/ava5.png" alt=""></a></div>
                                <div class="rc-comment">
                                    <form action="#" method="post">
                                        <textarea rows="3">Share what you think?</textarea >
                                        <button type="submit">
                                            <i class="cv cvicon-cv-add-comment"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="comments-list">

                                <div class="cl-header">
                                    <div class="c-nav">
                                        <ul class="list-inline">
                                            <li><a href="#" class="active">Popular <span class="hidden-xs">Comments</span></a></li>
                                            <li><a href="#">Newest <span class="hidden-xs">Comments</span></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- comment -->
                                <div class="cl-comment">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava8.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">BOWTZ pros</a> . 1 week ago</div>
                                        <div class="cl-text">Really great story. You're doing a great job. Keep it up pal.</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 121</span> <span class="grey"><span class="circle"></span> 2</span> . <a href="#">Reply</a></div>
                                        <div class="cl-replies"><a href="#">View all 5 replies <i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
                                        <div class="cl-flag"><a href="#"><i class="cv cvicon-cv-flag"></i></a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END comment -->

                                <!-- reply comment -->
                                <div class="cl-comment-reply">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava7.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">kingPIN</a> . 6 days ago</div>
                                        <div class="cl-text"> I was stuck too. then I started to shoot everything in Doom.</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 70</span> <span class="grey"><span class="circle"></span> 9</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END reply comment -->

                                <!-- comment -->
                                <div class="cl-comment">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava2.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">Isleifna</a> . 1 week ago</div>
                                        <div class="cl-text">Omg thank you so much, idk how I couldn't figure out that master trap</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 245</span> <span class="grey"><span class="circle"></span> 19</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END comment -->

                                <!-- comment -->
                                <div class="cl-comment">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava3.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">Mark</a> . 2 days ago</div>
                                        <div class="cl-text">you welcome could you watch my video plz dude you are awsome</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 516</span> <span class="grey"><span class="circle"></span> 64</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END comment -->

                                <!-- comment -->
                                <div class="cl-comment">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava4.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">High_on_meme</a> . 4 days ago</div>
                                        <div class="cl-text">People allover the world took his music to heart and that music coming from his soul</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 95</span> <span class="grey"><span class="circle"></span> 0</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END comment -->

                                <!-- reply comment -->
                                <div class="cl-comment-reply">
                                    <div class="cl-avatar"><a href="#"><img src="images/ava5.png" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">Battlefeelz</a> . 19 hours ago</div>
                                        <div class="cl-text">He looks like Rhett with the most glorious wig ever</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 871</span> <span class="grey"><span class="circle"></span> 32</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END reply comment -->

                                <div class="row hidden-xs">
                                    <div class="col-lg-12">
                                        <div class="loadmore-comments">
                                            <form action="#" method="post">
                                                <button class="btn btn-default h-btn">Load more Comments</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END comments -->
                    </div>
                </div>
                <div class="content-block head-div head-arrow visible-xs">
                    <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div>
                    <div class="adblock2 adblock2-v2">
                        <div class="img">
                            <span>Google AdSense 300 x 250</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12 hidden-xs">

                <!-- up next -->
                <div class="caption">
                    <div class="left">
                        <a href="#">Up Next</a>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    @forelse(App\Models\Book::where('instructor_id',$book->instructor_id)->where('id', '!=' ,$book->id)->get() as $insBook)
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="{{route('home.book.details',$insBook->slug)}}"><img src="{{asset($insBook->image)}}" alt=""></a>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="{{route('home.book.details',$insBook->slug)}}">{{$insBook->title}}</a>
                            </div>
                            <div class="v-views">
                                Free
                            </div>
                            <div class="v-views"> <span style="color: blue;">{{$insBook->download}} Download</span> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @empty
                    <h4>No book found</h4>
                    @endforelse

                   
                </div>
                <!-- END up next -->

                <div class="adblock">
                    <div class="img">
                        Google AdSense<br>
                        336 x 280
                    </div>
                </div>

                <!-- Recomended Videos -->
                <div class="caption">
                    <div class="left">
                        <a href="#">Recomended Book</a>
                    </div>
                    <!-- <div class="right">
                        <a href="#">Autoplay <i class="cv cvicon-cv-btn-off"></i></a>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    @forelse(App\Models\Book::where('title', 'LIKE' ,$book->title)->orWhere('id', 'LIKE' ,$book->id)->where('id', '!=' ,$book->id)->get()->take(10) as $insBook)
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="{{route('home.book.details',$insBook->slug)}}"><img src="{{asset($insBook->image)}}" alt=""></a>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="{{route('home.book.details',$insBook->slug)}}">{{$insBook->title}}</a>
                            </div>
                            <div class="v-views">
                                Free
                            </div>
                            <div class="v-views"> <span style="color: blue;">{{$insBook->download}} Download</span> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @empty
                    @endforelse
                </div>
                <!-- END Recomended Videos -->

                <!-- load more -->
                <!-- <div class="loadmore">
                    <a href="#">Show more videos</a>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- footer -->
@include('fontend.inc.footer')
<!-- /footer -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('fontend') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/jquery-migrate-1.4.1.min.js"></script>
<script src="{{ asset('fontend') }}/assets/bootstrap/js/popper.js"></script>
<script src="{{ asset('fontend') }}/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/vendor/clipboard/dist/clipboard.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelement-and-player.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/vendor/magnificPopup/dist/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('fontend') }}/assets/js/custom.js"></script>

</body>
</html>
