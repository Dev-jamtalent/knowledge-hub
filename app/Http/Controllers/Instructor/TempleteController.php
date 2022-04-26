<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Templete;
use App\Models\TempleteCategory;
use App\Models\TempleteTag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cohensive\Embed\Facades\Embed;
use File;
use Auth;

class TempleteController extends Controller
{
    public function create(){
        return view('backend.pages.template.create');
    }

    public function store(Request $request){
        $save_image = null;
        $file = null;
        $video = null;
        $slug = Str::slug($request->title);
        $count = Templete::where('slug',$slug)->count();
            if ($count > 0) {
                $slug = $request->title . (string)Carbon::now();
                $slug = Str::slug($slug);
            }

            if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/templete/thambnail/'.$name_gen);
                $save_image = 'uploads/templete/thambnail/'.$name_gen;
            }
            if ( $request->video ) 
            {
                $file                   = $request->file('video');
                $fileName = time().'.'.$request->video->extension();
                $request->video->move(public_path('uploads/templete/file'), $fileName);
                $video             = 'uploads/templete/file/' . $fileName;
            }
            if ( $request->file ) 
            {
                $file                   = $request->file('file');
                $fileName = time().'.'. $request->file->extension();
                $request->file->move(public_path('uploads/templete/thambnail'), $fileName);
                $file             = 'uploads/templete/thambnail/' . $fileName;
                
            }
            $templete_id =  Templete::insertGetId([
                'instructor_id'             => Auth()->User()->instructor->id,
                'title'                     => $request->title,
                'description'               => $request->description,
                'image'                     => $save_image,
                'video'                     => $video,
                'file'                      => $file,
                'price'                     => $request->price,
                'discount'                  => $request->discount,
                'link_live_preview'         => $request->link_live_preview,
                'link_g_drive'              => $request->link_g_drive,
                'link_dropbox'              => $request->link_dropbox,
                'privacy'                   => $request->privacy,
                'language'                  => $request->language,
                'slug'                      => $slug,
                'created_at'                => Carbon::now(),
            ]);
            if ($request->category_names) {
                $category_names = $request->category_names;
                foreach ($category_names as $category_name) {
                    TempleteCategory::insert([
                        'templete_id'                  => $templete_id,
                        'category_name'                  => $category_name,
                        'created_at'                => Carbon::now(),
                    ]);
                }
            }

            if ($request->tag_names) {
                $tags = $request->tag_names;
                foreach ($tags as $tag_name) {
                    TempleteTag::insert([
                        'templete_id'              => $templete_id,
                        'tag_name'              => $tag_name,
                        'created_at'            => Carbon::now(),
                    ]);
                }
            }
            return redirect()->back();       
    }
}
