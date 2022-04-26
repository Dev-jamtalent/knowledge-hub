<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Templete;
use App\Models\Template;
use App\Models\TempleteCategory;
use App\Models\TempleteTag;
use App\Models\TemplateTag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cohensive\Embed\Facades\Embed;
use File;
use Auth;
use App\Models\UserTempleteTag;


class TemplateController extends Controller
{
    public function manage(){
        $templates = Template::where('user_id',Auth::user()->id)->get();
        return view('backend.pages.template.manage',compact('templates'));
    }

    public function allTags(){
        $data = UserTempleteTag::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }


    public function tagStore(Request $request){

        $request->validate([
            
        ]);
        $data = UserTempleteTag::insert([
            'user_id' => Auth::user()->id,
            'templete_tag_name' => $request->name,
            'status' => 1,
        ]);
        return response()->json([
        'message' => 'Tag Add successfully',
        'success' => true,
        
    ], 201);
    }


    //template route
    public function create(){
        return view('backend.pages.template.create');
    }

    public function store(Request $request){
        $save_image = null;
        $file = null;
        $video = null;
        $slug = Str::slug($request->title);
        $count = Template::where('slug',$slug)->count();
            if ($count > 0) {
                $slug = $request->title . (string)Carbon::now();
                $slug = Str::slug($slug);
            }

            if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/template/thambnail/'.$name_gen);
                $save_image = 'uploads/template/thambnail/'.$name_gen;
            }
            if ( $request->video ) 
            {
                $file                   = $request->file('video');
                $fileName = time().'.'.$request->video->extension();
                $request->video->move(public_path('uploads/template/file'), $fileName);
                $video             = 'uploads/templete/file/' . $fileName;
            }
            if ( $request->file ) 
            {
                $file                   = $request->file('file');
                $fileName = time().'.'. $request->file->extension();
                $request->file->move(public_path('uploads/template/thambnail'), $fileName);
                $file             = 'uploads/template/thambnail/' . $fileName;
                
            }
            $template_id =  Template::insertGetId([
                'user_id'             => Auth()->User()->instructor->id,
                'title'                     => $request->title,
                'description'               => $request->description,
                'image'                     => $save_image,
                'video'                     => $video,
                'file'                      => $file,
                'price_type'                => $request->price_type,
                'price'                     => $request->price,
                'discount'                  => $request->discount,
                'category_id'               => $request->category_id,
                'sub_category_id'           => $request->subcategory_id,
                'url'                       => $request->url,
                'link_live_preview'         => $request->link_live_preview,
                'link_g_drive'              => $request->link_g_drive,
                'link_dropbox'              => $request->link_dropbox,
                'link_git_hub'              => $request->link_git_hub,
                'slug'                      => $slug,
                'created_at'                => Carbon::now(),
            ]);
            
            if ($request->tag_names) {
                $tags = $request->tag_names;
                foreach ($tags as $tag_name) {
                    TemplateTag::insert([
                        'template_id'              => $template_id,
                        'template_tag_name'              => $tag_name,
                        'created_at'            => Carbon::now(),
                    ]);
                }
            }
            return redirect()->back();       
    }

    public function delete($id){
        $template_id =  Template::find($id)->delete();
        return redirect()->back();
    }

}
