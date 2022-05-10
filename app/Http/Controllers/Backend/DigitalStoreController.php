<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use File;
use Auth;
use App\Models\DigitalStore;
use App\Models\Template;
use App\Models\DigitalStoreTemplate;
use App\Models\DigitalstoreTag;
use App\Models\UserTemplateTag;
class DigitalStoreController extends Controller
{
    public function digitalStoreManage(){

        return view('backend.pages.digitalStore.manage');
    }

    public function userDigitalStore(Request $request){
        $request->validate([

        ]);
        $save_image = null;
        $slug = Str::slug($request->name);
        if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/digitel-store/thambnail/'.$name_gen);
                $save_image = 'uploads/digitel-store/thambnail/'.$name_gen;
            }
        $data = DigitalStore::insert([
            'user_id'                   => Auth::user()->id,
            'name'                      => $request->name,
            'image'                     => $save_image,
            'price_type'                => $request->price_type,
            'price'                     => $request->price,
            'discount'                  => $request->discount,
            'slug'                      => $slug,
            'description'               => $request->demo2,
            'category_id'               => $request->id,
            'sub_category_id'           => $request->subcategory_id,
        ]);
        if ($request->tag_names) {
                $tags = $request->tag_names;
                foreach ($tags as $tag_name) {
                    DigitalstoreTag::insert([
                        'digital_store_id'      => $data,
                        'tag_name'              => $tag_name,
                        'created_at'            => Carbon::now(),
                    ]);
                    $userTemplateTag = UserTemplateTag::where('templete_tag_name',$tag_name)->first();
                    if($userTemplateTag == null){
                        UserTemplateTag::insert([
                        'user_id'              => Auth::user()->id,
                        'templete_tag_name'              => $tag_name,
                        'status'=> 1,
                        'created_at'            => Carbon::now(),
                    ]);
                    }
                }
            }
        return response()->json([
        'message' => 'DigitalStore Add successfully',
        'success' => true, 
    ], 201);
    }
    public function userDigitalStoreAll(){
        $data = DigitalStore::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }

    public function alltemplateDigital($id){
        $digitalstore = DigitalStore::where('id',$id)->first();
        return view('backend.pages.digitalStore.templates',compact('digitalstore'));
    }

    public function userDigitalStoreTemplateStore(Request $request){
         $data = DigitalStoreTemplate::insert([
            'template_id'                           => $request->id,
            'digital_store_id'                      => $request->digital_store_id,
        ]);
        $template = Template::findOrFail($request->id)->update([
            'digital_store_id'  => $request->digital_store_id,
        ]);
        return response()->json([
        'message' => 'Digital Store template Add successfully',
        'success' => true, 
    ], 201);
    }

    public function alltemplateDigitalShow($id){
        $data = DigitalStoreTemplate::where('digital_store_id',$id)->with('template')->get();
        

        return response()->json($data);
    }
}
