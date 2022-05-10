<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Channel;
use App\Models\Podcast;
use App\Models\Library;
use App\Models\DigitalStore;
use App\Models\Video;
use App\Models\BookImage;
use App\Models\BookTag;
use App\Models\ChannelVideo;
use App\Models\PodcastAudio;
use App\Models\DigitalStoreTemplate;
use App\Models\LibraryBook;
use App\Models\Audio;
use App\Models\User;
use Auth;
class PagesController extends Controller
{
    public function index(){
        $books = Book::latest()->get();
        $videos = Video::latest()->get();
        $podcasts = Podcast::latest()->get();
        $libraries = Library::latest()->get();
        $digitalStores = DigitalStore::latest()->get();
        $channels = Channel::latest()->get();
        return view('fontend.pages.index',compact('books','videos','podcasts','libraries','digitalStores','channels'));
    }
    // login controller 
    public function login(){
        return view('fontend.pages.login');
    }

    // book controller 
    public function bookDetails($id,$slug){
        $book = Book::where('id',$id)->with('user')->first();
        return view('fontend.pages.single-book',compact('book'));
    }

    //video route
    public function videoDetails($id,$slug){
        $video = Video::where('id',$id)->with('videoTags','user')->first();
        return view('fontend.pages.single-video',compact('video'));
    }
    //Audio route
    public function audioDetails($id,$slug){
        $audio = Audio::where('id',$id)->with('audioTags','user')->first();
        return view('fontend.pages.single-audio',compact('audio'));
    }
    public function register(){
        return view('fontend.pages.register');
    }

    // channel view

    public function channel($id,$slug){
        $channel = Channel::where('id',$id)->with('user')->first();
        $channelVideos = ChannelVideo::where('channel_id',$id)->with('video')->get();
        return view('fontend.pages.channel',compact('channel','channelVideos'));
    }
    public function podcast($id,$slug){
        $podcast = Podcast::where('id',$id)->with('user','category','subcategory')->first();
        $podcastAudios = PodcastAudio::where('podcast_id',$id)->with('audio')->get();
        return view('fontend.pages.podcast',compact('podcast','podcastAudios'));
    }

    public function digitalStore($id,$slug){
        $digitalstore = DigitalStore::where('id',$id)->with('user')->first();
        $digitalstoreTemplates = DigitalStoreTemplate::where('digital_store_id',$id)->with('template')->get();
        return view('fontend.pages.digitalstore',compact('digitalstoreTemplates','digitalstore'));
    }

    public function library($id,$slug){
        $library = Library::where('id',$id)->with('user','category','subcategory','tags')->first();
        $libraryBooks = LibraryBook::where('library_id',$id)->with('book')->with('user','category','subcategory')->get();
        return view('fontend.pages.library',compact('library','libraryBooks'));
    }

    public function userDetails($id,$slug){
        $user = User::where('id',$id)->first();
        return view('fontend.pages.user-details',compact('user'));
    }

}
