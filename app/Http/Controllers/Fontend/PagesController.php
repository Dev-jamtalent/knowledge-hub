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
    public function bookDetails($slug){
        $book = Book::where('slug',$slug)->first();
        return view('fontend.pages.single-book',compact('book'));
    }

    //video route
    public function videoDetails($slug){
        $video = Video::where('slug',$slug)->first();
        return view('fontend.pages.single-video',compact('video'));
    }

    public function register(){
        return view('fontend.pages.register');
    }

    // channel view

    public function channel($id,$slug){
        return view('fontend.pages.channel');
    }

}
