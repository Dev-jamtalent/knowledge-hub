<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use File;
use Auth;
use App\Models\Channel;
use App\Models\Video;
use App\Models\ChannelVideo;
class ChannelContrller extends Controller
{
    public function channelManage(){
        return view('backend.pages.channel.manage');
    }
    public function userChannelStore(Request $request){
        $request->validate([

        ]);
        $save_image = null;
        $slug = Str::slug($request->name);
        if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/channel/thambnail/'.$name_gen);
                $save_image = 'uploads/channel/thambnail/'.$name_gen;
            }
        $data = Channel::insert([
            'user_id'                   => Auth::user()->id,
            'name'                      => $request->name,
            'image'                     => $save_image,
            'price_type'                => $request->price_type,
            'price'                     => $request->price,
            'discount'                  => $request->discount,
            'slug'                      => $slug,
        ]);
        return response()->json([
        'message' => 'Channel Add successfully',
        'success' => true, 
    ], 201);
    }

    public function userChannelAll(){
        $data = Channel::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }
    public function addVideoChannel($id){

    }
    public function allVideoChannel($id){

        $channel = Channel::where('id',$id)->first();
        return view('backend.pages.channel.videos',compact('channel'));
    }
    public function allVideoChannelShow($id){
        $data = ChannelVideo::where('channel_id',$id)->with('video')->get();
        

        return response()->json($data);
    }

    public function userChannelVideoStore(Request $request){
        $data = ChannelVideo::insert([
            'video_id'                      => $request->id,
            'channel_id'                    => $request->channel_id,
        ]);
        $video = Video::findOrFail($request->id)->update([
            'channel_id'  => $request->channel_id,
        ]);
        return response()->json([
        'message' => 'Channel video Add successfully',
        'success' => true, 
    ], 201);
    }
}
