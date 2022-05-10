<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cohensive\Embed\Facades\Embed;
use App\Models\Audio;
use App\Models\AudioTag;
use App\Models\UserAudioTag;
use App\Models\PodcastAudio;
use File;
use Auth;
class AudioController extends Controller
{
    public function create(){
        return view('backend.pages.audio.create');
    }
    public function manage(){
        $audios = Audio::where('user_id',Auth::user()->id)->get();
        return view('backend.pages.audio.manage',compact('audios'));
    }
    public function store(Request $request){
        $save_image = null;
        $file = null;
        $video = null;
        $slug = Str::slug($request->title);
        $count = Audio::where('slug',$slug)->count();
            if ($count > 0) {
                $slug = $request->title . (string)Carbon::now();
                $slug = Str::slug($slug);
            }

            if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/audio/thambnail/'.$name_gen);
                $save_image = 'uploads/audio/thambnail/'.$name_gen;
            }
            if ( $request->video ) 
            {
                $file                   = $request->file('video');
                $fileName = time().'.'.$request->video->extension();
                $request->video->move(public_path('uploads/audio/file'), $fileName);
                $video             = 'uploads/audio/file/' . $fileName;
            }
            if ( $request->file ) 
            {
                $file                   = $request->file('file');
                $fileName = time().'.'. $request->file->extension();
                $request->file->move(public_path('uploads/audio/thambnail'), $fileName);
                $file             = 'uploads/audio/thambnail/' . $fileName;
                
            }
            $audio_id =  Audio::insertGetId([
                'user_id'                   => Auth()->User()->instructor->id,
                'podcast_id'                =>  $request->podcast_id,
                'title'                     => $request->title,
                'description'               => $request->description,
                'image'                     => $save_image,
                'file'                      => $file,
                'price_type'                => $request->price_type,
                'price'                     => $request->price,
                'discount'                  => $request->discount,
                'category_id'               => $request->category_id,
                'sub_category_id'           => $request->subcategory_id,
                'link_g_drive'              => $request->link_g_drive,
                'link_dropbox'              => $request->link_dropbox,
                'slug'                      => $slug,
                'created_at'                => Carbon::now(),
            ]);
            
            if ($request->tag_names) {
                $tags = $request->tag_names;
                foreach ($tags as $tag_name) {
                    AudioTag::insert([
                        'audio_id'              => $audio_id,
                        'tag_name'              => $tag_name,
                        'created_at'            => Carbon::now(),
                    ]);
                    $userAudioTag = UserAudioTag::where('audio_tag_name',$tag_name)->first();
                    if($userAudioTag == null){
                            UserAudioTag::insert([
                            'user_id'              => Auth::user()->id,
                            'audio_tag_name'              => $tag_name,
                            'status'=> 1,
                            'created_at'            => Carbon::now(),
                        ]);
                    }
                }
            }
            if ($request->podcast != 0) {
                $data = PodcastAudio::insert([
                'audio_id'                  => $audio_id,
                'podcast_id'                => $request->podcast_id,
                'created_at'                => Carbon::now(),
            ]);
        }
            return redirect()->back();       
    }
    public function delete($id){
        $audio_id =  Audio::find($id)->delete();
        return redirect()->back();
    }
}
