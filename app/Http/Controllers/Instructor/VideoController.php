<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoTag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cohensive\Embed\Facades\Embed;
use File;
use Auth;
class VideoController extends Controller
{
    public function create(){
        return view('backend.pages.video.create');
    }
    public function store(Request $request){
        $save_image = null;
        $file = null;
        $video = null;
        $slug = Str::slug($request->title);
        $count = Video::where('slug',$slug)->count();
        $embed = Embed::make($request->link)->parseUrl();
       
        if (!$embed){

        }
        else{
            if ($count > 0) {
                $slug = $request->title . (string)Carbon::now();
                $slug = Str::slug($slug);
            }

            if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/books/thambnail/'.$name_gen);
                $save_image = 'uploads/books/thambnail/'.$name_gen;
            }
            if ( $request->video ) 
            {
                $file                   = $request->file('video');
                $fileName = time().'.'.$request->video->extension();

                $request->video->move(public_path('uploads/books/file'), $fileName);
                $video             = 'uploads/books/file/' . $fileName;
            }
            if ( $request->file ) 
            {
                $file                   = $request->file('file');
                $fileName = time().'.'. $request->file->extension();
                $request->file->move(public_path('uploads/books/thambnail'), $fileName);
                $file             = 'uploads/books/thambnail/' . $fileName;
                
            }
            $embed->setAttribute(['width' => '100%','height'=>'600px']);
            $video_id =  Video::insertGetId([
                'instructor_id'             => Auth()->User()->instructor->id,
                'title'                     => $request->title,
                'description'               => $request->description,
                'image'                     => $save_image,
                'video'                     => $video,
                'file'                      => $file,
                'price'                     => $request->price,
                'discount'                  => $request->discount,
                'url'                       => $embed->getHtml(),
                'link'                      => $request->link,
                'privacy'                   => $request->privacy,
                'language'                  => $request->language,
                'slug'                      => $slug,
                'created_at'                => Carbon::now(),
            ]);
            if ($request->category_names) {
                $category_names = $request->category_names;
                foreach ($category_names as $category_name) {
                    VideoTag::insert([
                        'video_id'                  => $video_id,
                        'tag_name'                  => $category_name,
                        'created_at'                => Carbon::now(),
                    ]);
                }
            }

            if ($request->tag_names) {
                $tags = $request->tag_names;
                foreach ($tags as $tag_name) {
                    VideoTag::insert([
                        'video_id'              => $video_id,
                        'tag_name'              => $tag_name,
                        'created_at'            => Carbon::now(),
                    ]);
                }
            }
            return redirect()->back();
            }
        
    }
}
