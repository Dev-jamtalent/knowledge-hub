<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use File;
use Auth;
use App\Models\Library;
use App\Models\LibraryBook;
use App\Models\Book;
use App\Models\LibraryTag;
use App\Models\UserBookTag;
class LibraryController extends Controller
{
    public function libraryManage(){
        return view('backend.pages.library.manage');
    }
    public function userLibraryStore(Request $request){
        $request->validate([

        ]);
        $save_image = null;
        $slug = Str::slug($request->name);
        if ($request->image) {
                $image = $request->file('image');
                $name_gen = time() . '.' . $image->extension();
                Image::make($image)->save('uploads/library/thambnail/'.$name_gen);
                $save_image = 'uploads/library/thambnail/'.$name_gen;
            }
        $data = Library::insert([
            'user_id'                   => Auth::user()->id,
            'name'                      => $request->name,
            'image'                     => $save_image,
            'price_type'                => $request->price_type,
            'price'                     => $request->price,
            'discount'                  => $request->discount,
            'slug'                      => $slug,
            'description'               => $request->description,
            'category_id'               => $request->category_id,
            'sub_category_id'           => $request->subcategory_id,
            'created_at'                => Carbon::now(),
        ]);

        if ($request->tag_names) {
            $tags = $request->tag_names;
            foreach ($tags as $tag_name) {
                LibraryTag::insert([
                    'library_id'       => $data,
                    'tag_name'         => $tag_name,
                    'created_at'    => Carbon::now(),
                ]);
                $userBookTag = UserBookTag::where('book_tag_name',$tag_name)->first();
                if($userBookTag == null){
                        UserBookTag::insert([
                        'user_id'              => Auth::user()->id,
                        'book_tag_name'              => $tag_name,
                        'status'=> 1,
                        'created_at'            => Carbon::now(),
                    ]);
                }
            }
        }


        return response()->json([
        'message' => $data,
        'success' => true, 
    ], 201);
    }

    public function userLibraryAll(){
        $data = Library::where('user_id',Auth::user()->id)->get();
        return response()->json($data);
    }

    public function allBookLibrary($id){

        $library = Library::where('id',$id)->first();
        return view('backend.pages.library.books',compact('library'));
    }


    public function allLibraryBookShow($id){
        $data = LibraryBook::where('library_id',$id)->with('book')->get();
        return response()->json($data);
    }


    public function userLibraryBookStore(Request $request){
        $data = LibraryBook::insert([
            'book_id'                      => $request->id,
            'library_id'                    => $request->library_id,
        ]);
        $book = Book::findOrFail($request->id)->update([
            'library_id'  => $request->library_id,
        ]);
        return response()->json([
        'message' => 'Library Book Add successfully',
        'success' => true, 
    ], 201);
    }
}
