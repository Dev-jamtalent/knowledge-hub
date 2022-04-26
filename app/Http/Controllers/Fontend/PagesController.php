<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Video;
use App\Models\BookImage;
use App\Models\BookTag;
use Auth;
class PagesController extends Controller
{
    public function index(){
        $books = Book::latest()->get();
        $videos = Video::latest()->get();
        return view('fontend.pages.index',compact('books','videos'));
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

}
