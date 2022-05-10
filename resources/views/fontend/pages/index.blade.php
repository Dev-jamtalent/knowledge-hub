@extends("fontend.layouts.fontend")
@section("wrapper")

<!-- goto -->
<div class="container-fluid">
    <div class="row">
        <div class="navbar-container2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 hidden-xs">
                        <div class="goto">
                            Go to:
                        </div>
                    </div>
                    <div class="col-lg-3  col-sm-10 col-xs-12">
                        <div class="h-icons">
                            <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked Videos"></i></a>
                            <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                            <a href="#"><i class="cv cvicon-cv-play-circle" data-toggle="tooltip" data-placement="top" title="Saved Playlist"></i></a>
                            <a href="#"><i class="cv cvicon-cv-purchased" data-toggle="tooltip" data-placement="top" title="Purchased Videos"></i></a>
                            <a href="#"><i class="cv cvicon-cv-history" data-toggle="tooltip" data-placement="top" title="History"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-10 hidden-xs">
                        <div class="h-resume">
                            <div class="play-icon">
                                <a href="#"><i class="cv cvicon-cv-play"></i></a>
                            </div>
                            Resume:  <span class="color-default">Daredevil Season 2 : Episode 6 </span>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-2 hidden-xs">
                        <div class="h-grid">
                            <a href="#"><i class="cv cvicon-cv-grid-view"></i></a>
                            <a href="#"><i class="cv cvicon-cv-list-view"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /goto -->

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

               

                <!-- Featured Books -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Library</span>
                                        </a>
                                    </li>
                                    <li><a href="#">New Library</a></li>
                                    <li class="hidden-xs"><a href="#">Recommended For You</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
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
                            @forelse($libraries as $librariy)
                            <div class="col-lg-3 col-sm-6 ">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('home.library.details',[$librariy->id,$librariy->slug])}}"><img src="{{ asset($librariy->image) }}" alt=""></a>
                                        
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('home.library.details',[$librariy->id,$librariy->slug])}}">{{$librariy->name}}</a>
                                    </div>
                                    <div class="v-views">
                                        1 Subscribes. 
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h4>No book found</h4>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
                <!-- /Featured Books -->
                <!-- Featured cannel -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="" class="color-active">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Channel</span>
                                        </a>
                                    </li>
                                    <li><a href="#">New Channel</a></li>
                                    <li class="hidden-xs"><a href="#">Recommended For You</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
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
                            @foreach($channels as $channel)
                            <div class="col-lg-3 col-sm-6">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('home.channel.details',[$channel->id,$channel->slug])}}"><img src="{{ asset($channel->image) }}" alt=""></a>
                                        
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('home.channel.details',[$channel->id,$channel->slug])}}">{{$channel->name}}</a>
                                    </div>
                                    <div class="v-views">
                                        1 Subscribes. 
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Featured channel -->
                <!-- Featured podcast -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Podcast</span>
                                        </a>
                                    </li>
                                    <li><a href="#">New Podcasts</a></li>
                                    <li class="hidden-xs"><a href="#">Recommended For You</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
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
                            @foreach($podcasts as $podcast)
                            <div class="col-lg-3 col-sm-6">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('home.podcast.details',[$podcast->id,$podcast->slug])}}"><img src="{{ asset($podcast->image) }}" alt=""></a>
                                        
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('home.podcast.details',[$podcast->id,$podcast->slug])}}">{{$podcast->name}}</a>
                                    </div>
                                    <div class="v-views">
                                        1 Subscribes. 
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Featured cast -->
                <!-- Featured Digital Store -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Digitalstore</span>
                                        </a>
                                    </li>
                                    <li><a href="#">New Digitalstore</a></li>
                                    <li class="hidden-xs"><a href="#">Recommended For You</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
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
                            @foreach($digitalStores as $digitalStore)
                            <div class="col-lg-3 col-sm-6">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('home.digitalstore.details',[$digitalStore->id,$digitalStore->slug])}}"><img src="{{ asset($digitalStore->image) }}" alt=""></a>
                                        
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('home.digitalstore.details',[$digitalStore->id,$digitalStore->slug])}}">{{$digitalStore->name}}</a>
                                    </div>
                                    <div class="v-views">
                                        1 Subscribes. 
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Featured cast -->
               

            </div>
        </div>
    </div>
</div>
@endsection