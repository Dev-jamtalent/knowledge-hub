<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserTempleteCat;
use App\Models\UserTempleteSubCat;
use App\Models\UserVideoCategory;
use App\Models\UserVideoSubCategory;
use App\Models\UserBookCategory;
use App\Models\UserBookSubCategory;
use App\Models\UserBookTag;
use App\Models\UserAudioCategory;
use App\Models\UserAudioSubCategory;
use App\Models\UserPostCategory;
use App\Models\UserPostSubCategory;
use Auth;
class CategoryController extends Controller
{
    public function category(){
        return view('backend.pages.template.category');
    }
    public function index(){
        $data = UserTempleteCat::get();
        return response()->json($data);
    }
    public function templeteCategoryAjax($id){
        $data = UserTempleteSubCat::where('user_templete_cat_id',$id)->get();
        return response()->json($data);
    }
    public function store(Request $request){

        $request->validate([

        ]);
        $data = UserTempleteCat::insert([
            'user_id' => Auth::user()->id,
            'category_name' => $request->name,
        ]);
        return response()->json([
        'message' => 'Category Add successfully',
        'success' => true, 
    ], 201);
    }

    public function subCategory(){
        $data = UserTempleteSubCat::where('user_id',Auth::user()->id)->with('category')->first();
        return view('backend.pages.template.sub-category');
    }
    public function subCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserTempleteSubCat::insert([
            'user_id'                           => Auth::user()->id,
            'user_templete_cat_id'              => $request->id,
            'templete_sub_category_name'        => $request->name,
        ]);
        return response()->json([
        'message' => 'Sub Category Add successfully',
        'success' => true,
        ], 201);
    }

    public function allSubCat(){
        $data = UserTempleteSubCat::where('user_id',Auth::user()->id)->with('category')->get();
      
         return response()->json($data);
    }
    // video function

    public function userVideoCatManage(){
        return view('backend.pages.video.category');
    }

    public function userVideoCategoryStore(Request $request){

        $request->validate([

        ]);
        $data = UserVideoCategory::insert([
            'user_id'               => Auth::user()->id,
            'category_name'         => $request->name,
            'status'                => 1,
        ]);
        return response()->json([
            'message' => 'Vidoe Category Add successfully',
            'success' => true, 
        ], 201);
    }
    public function userVideoCatAll(){
        $data = UserVideoCategory::where('user_id',Auth::user()->id)->get();
         return response()->json($data);
    }
    // video subcategory
    public function userVideoSubCategory(){
        return view('backend.pages.video.sub-category');
    }
    //vdieo sub category ajax
    public function vidoeCategoryAjax($id){
        $data = UserVideoSubCategory::where('user_video_cat_id',$id)->get();
        return response()->json($data);
    }
    public function userVideoSubCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserVideoSubCategory::insert([
            'user_id'                           => Auth::user()->id,
            'user_video_cat_id'                 => $request->id,
            'video_sub_category_name'           => $request->name,
            'status'=> 1,
        ]);
        return response()->json([
        'message' => 'Sub Category Add successfully',
        'success' => true,
        ], 201);
    }
    // all sub Category
    public function userVideoAllSubCat(){
        $data = UserVideoSubCategory::where('user_id',Auth::user()->id)->with('category')->get();
         return response()->json($data);
    }

    // Book Category

    public function BookCategory(){
        return view('backend.pages.book.category');
    }

    public function bookStore(Request $request){
        $request->validate([

        ]);
        $data = UserBookCategory::insert([
            'user_id' => Auth::user()->id,
            'category_name' => $request->name,
        ]);
        return response()->json([
        'message' => 'Category Add successfully',
        'success' => true, 
        ], 201);
    }

    public function UserAllBook(){
        $data = UserBookCategory::where('user_id',Auth::user()->id)->get();
         return response()->json($data);
    }

    // Book Sub Category

    public function userBookSubCategory(){
        return view('backend.pages.book.sub-category');
    }

    public function userBookSubCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserBookSubCategory::insert([
            'user_id'                           => Auth::user()->id,
            'user_book_cat_id'              => $request->id,
            'book_sub_category_name'        => $request->name,
            'status'=> 1,
        ]);
        return response()->json([
        'message' => 'Sub Category Add successfully',
        'success' => true,
        ], 201);
    }

    public function userBookAllSubCat(){
        $data = UserBookSubCategory::where('user_id',Auth::user()->id)->with('category')->get();
         return response()->json($data);
    }
    public function bookCategoryAjax($id){
        $data = UserBookSubCategory::where('user_book_cat_id',$id)->get();
        return response()->json($data);
    }
    // audio controller
    public function userAudioCatManage(){
        return view('backend.pages.audio.category');
    }

    public function userAudioCatAll(){
        $data = UserAudioCategory::where('user_id',Auth::user()->id)->get();
         return response()->json($data);
    }

    public function userAudioCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserAudioCategory::insert([
            'user_id'               => Auth::user()->id,
            'category_name'         => $request->name,
            'status'                => 1,
            'created_at'            => Carbon::now(),
        ]);
        return response()->json([
        'message' => 'Category Add successfully',
        'success' => true, 
        ], 201);
    }

    public function userAudioSubCategory(){
        return view('backend.pages.audio.sub-category');
    }
    public function userAudioSubCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserAudioSubCategory::insert([
            'user_id'                           => Auth::user()->id,
            'user_audio_cat_id'                 => $request->id,
            'audio_sub_category_name'           => $request->name,
            'status'                            => 1,
            'created_at'                        => Carbon::now(),
        ]);
        return response()->json([
        'message' => 'Sub Category Add successfully',
        'success' => true,
        ], 201);
    }

    public function userAudioAllSubCat(){
        $data = UserAudioSubCategory::where('user_id',Auth::user()->id)->with('category')->get();
         return response()->json($data);
    }

    public function audioCategoryAjax($id){
        $data = UserAudioSubCategory::where('user_audio_cat_id',$id)->get();
        return response()->json($data);
    }


    //post route
    public function userPostCatManage(){
        return view('backend.pages.post.category');
    }

    public function userPostCatAll(){
        $data = UserPostCategory::where('user_id',Auth::user()->id)->get();
         return response()->json($data);
    }

    public function userPostCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserPostCategory::insert([
            'user_id'               => Auth::user()->id,
            'category_name'         => $request->name,
            'status'                => 1,
            'created_at'            => Carbon::now(),
        ]);
        return response()->json([
        'message' => 'Category Add successfully',
        'success' => true, 
        ], 201);
    }

    public function userPostSubCategory(){
        return view('backend.pages.post.sub-category');
    }
    public function userPostSubCategoryStore(Request $request){
        $request->validate([

        ]);
        $data = UserPostSubCategory::insert([
            'user_id'                           => Auth::user()->id,
            'user_post_cat_id'                 => $request->id,
            'post_sub_category_name'           => $request->name,
            'status'                            => 1,
            'created_at'                        => Carbon::now(),
        ]);
        return response()->json([
        'message' => 'Sub Category Add successfully',
        'success' => true,
        ], 201);
    }

    public function userPostAllSubCat(){
        $data = UserPostSubCategory::where('user_id',Auth::user()->id)->with('category')->get();
         return response()->json($data);
    }

    public function postCategoryAjax($id){
        $data = UserPostSubCategory::where('user_post_cat_id',$id)->get();
        return response()->json($data);
    }
}
