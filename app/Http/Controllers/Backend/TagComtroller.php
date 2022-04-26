<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserBookTag;
use App\Models\UserVideoTag;
use App\Models\UserAudioTag;
use App\Models\UserPostTag;
use Auth;
class TagComtroller extends Controller
{
    //book tag
    public function userBookTagManage(){
        return view('backend.pages.book.tag');
    }

    public function userBookTagStore(Request $request){

        $request->validate([
            
        ]);
        $data = UserBookTag::insert([
            'user_id' => Auth::user()->id,
            'book_tag_name' => $request->name,
            'status' => 1,
        ]);
        return response()->json([
        'message' => 'Tag Add successfully',
        'success' => true,
        
    ], 201);
    }

    public function userBookAllTags(){
        $data = UserBookTag::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }

    // video tag
    public function userVidoeTagManage(){
        return view('backend.pages.video.tag');
    }
    public function userVidoeTagStore(Request $request){

        $request->validate([
            
        ]);
        $data = UserVideoTag::insert([
            'user_id' => Auth::user()->id,
            'video_tag_name' => $request->name,
            'status' => 1,
        ]);
        return response()->json([
        'message' => 'Tag Add successfully',
        'success' => true,
        
    ], 201);
    }
    public function userVidoeAllTags(){
        $data = UserVideoTag::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }

    // video tag
    public function userAudioTagManage(){
        return view('backend.pages.audio.tag');
    }

    public function userAudioTagStore(Request $request){
        $request->validate([
            
        ]);
        $data = UserAudioTag::insert([
            'user_id'               => Auth::user()->id,
            'audio_tag_name'        => $request->name,
            'status'                => 1,
            'created_at'            => Carbon::now(),
        ]);
        return response()->json([
            'message' => 'Tag Add successfully',
            'success' => true,
        ], 201);
    }

    public function userAudioAllTags(){
        $data = UserAudioTag::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }

    // post tag
    public function userPostTagManage(){
        return view('backend.pages.post.tag');
    }

    public function userPostTagStore(Request $request){
        $request->validate([
            
        ]);
        $data = UserPostTag::insert([
            'user_id'               => Auth::user()->id,
            'post_tag_name'         => $request->name,
            'status'                => 1,
            'created_at'            => Carbon::now(),
        ]);
        return response()->json([
        'message' => 'Tag Add successfully',
        'success' => true,
        
    ], 201);
    }

    public function userPostAllTags(){
        $data = UserPostTag::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }
}
