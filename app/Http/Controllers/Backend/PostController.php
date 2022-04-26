<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cohensive\Embed\Facades\Embed;
use File;
use Auth;
class PostController extends Controller
{
	//template route
    public function create(){
        return view('backend.pages.post.create');
    }
    public function manage(){
        $posts = Post::where('user_id',Auth::user()->id)->get();
        return view('backend.pages.post.manage',compact('posts'));
    }
    public function store(Request $request){
        $save_image = null;
        $file = null;
        $video = null;
        $slug = Str::slug($request->title);
        $count = Post::where('slug',$slug)->count();
            if ($count > 0) {
                $slug = $request->title . (string)Carbon::now();
                $slug = Str::slug($slug);
            }

            if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/post/thambnail/'.$name_gen);
                $save_image = 'uploads/post/thambnail/'.$name_gen;
            }
            $post_id =  Post::insertGetId([
                'user_id'             		=> Auth()->User()->instructor->id,
                'title'                     => $request->title,
                'description'               => $request->description,
                'image'                     => $save_image,
                'category_id'               => $request->category_id,
                'sub_category_id'           => $request->subcategory_id,
                'slug'                      => $slug,
                'created_at'                => Carbon::now(),
            ]);
            
            if ($request->tag_names) {
                $tags = $request->tag_names;
                foreach ($tags as $tag_name) {
                    PostTag::insert([
                        'post_id'              => $post_id,
                        'tag_name'              => $tag_name,
                        'created_at'            => Carbon::now(),
                    ]);
                }
            }
            return redirect()->back();       
    }
    public function delete($id){
        $post_id =  Post::find($id)->delete();
        return redirect()->back();
    }


}
