<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use File;
use Auth;
use App\Models\Podcast;
use App\Models\PodcastAudio;
use App\Models\Audio;
class PodcastController extends Controller
{
    public function podcastManage(){
        return view('backend.pages.podcast.manage');
    }
    public function podcastStore(Request $request){
        $request->validate([

        ]);
        $save_image = null;
        $slug = Str::slug($request->name);
        if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/podcast/thambnail/'.$name_gen);
                $save_image = 'uploads/podcast/thambnail/'.$name_gen;
            }
        $data = Podcast::insert([
            'user_id'                   => Auth::user()->id,
            'name'                      => $request->name,
            'image'                     => $save_image,
            'price_type'                => $request->price_type,
            'price'                     => $request->price,
            'discount'                  => $request->discount,
            'slug'                      => $slug,
        ]);
        return response()->json([
        'message' => 'Podcast Add successfully',
        'success' => true, 
        ], 201);
    }

    public function userPodcastAll(){
        $data = Podcast::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }

    public function allPodcastAudio($id){
        $podcast = Podcast::where('id',$id)->first();
        return view('backend.pages.podcast.audios',compact('podcast'));
    }

    public function allPodcastAudioShow($id){
        $data = PodcastAudio::where('podcast_id',$id)->with('audio')->get();
        return response()->json($data);
    }


    public function userPodcastAudioStore(Request $request){
        $data = PodcastAudio::insert([
            'audio_id'                       => $request->id,
            'podcast_id'                    => $request->podcast_id,
        ]);
        $book = Audio::findOrFail($request->id)->update([
            'podcast_id'  => $request->podcast_id,
        ]);
        return response()->json([
        'message' => 'Library Book Add successfully',
        'success' => true, 
    ], 201);
    }
    
}
