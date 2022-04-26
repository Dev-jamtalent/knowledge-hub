<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\BookTag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;
use Auth;
class BookController extends Controller
{
    public function create(){
        return view('backend.pages.book.create');
    }

    public function store(Request $request){
        $save_image = null;
        $file = null;
        $slug = Str::slug($request->title);
        $count = Book::where('slug',$slug)->count();
        if ($count > 0) {
            $slug = $request->title . (string)Carbon::now();
            $slug = Str::slug($slug);
        }

        if ($request->image) {
            $image = $request->file('image');
            $name_gen = time() . '.' . $image->extension();
            Image::make($image)->resize(500,500)->save('uploads/books/thambnail/'.$name_gen);
            $save_image = 'uploads/books/thambnail/'.$name_gen;

        }
        if ( $request->file ) 
        {
            $file                   = $request->file('file');
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads/books/file'), $fileName);
            $file             = 'uploads/books/file/' . $fileName;
        }
        $book_id =  Book::insertGetId([
            'instructor_id' => Auth()->User()->instructor->id,
            'title'                     => $request->title,
            'description'               => $request->description,
            'title'                     => $request->title,
            'image'                     => $save_image,
            'file'                      => $file,
            'price'                     => $request->price,
            'discount'                  => $request->discount,
            'category_id'               => $request->category_id,
            'slug'                      => $slug,
            'live_preview_link'         => $live_preview_link,
            'created_at'                => Carbon::now(),
        ]);
        if ($request->multi_img) {
            $images = $request->file('multi_img');
            foreach ($images as $img) {
            $make_name=time() . '.' . $img->extension();
            Image::make($img)->resize(917,1000)->save('uploads/books/images/'.$make_name);
            $uplodPath = 'uploads/books/images/'.$make_name;

                BookImage::insert([
                    'book_id'       => $book_id,
                    'image'         => $uplodPath,
                    'created_at'    => Carbon::now(),
                ]);
            }
        }

        if ($request->tag_names) {
            $tags = $request->tag_names;
            foreach ($tags as $tag_name) {
                BookTag::insert([
                    'book_id'       => $book_id,
                    'tag_name'         => $tag_name,
                    'created_at'    => Carbon::now(),
                ]);
            }
        }
        return redirect()->back();
    }

    public function manage(){
        $books = Book::latest()->where('instructor_id',Auth()->User()->instructor->id)->get();
        return view('backend.pages.book.manage',compact('books'));
    }
    public function bookDetails($id){
        $book = Book::Find($id);
        return view('backend.pages.book.book-details',compact('book'));
    }
    public function bookDownload($slug){
        $book = Book::where('slug',$slug)->first();
        $book = Book::Find($book->id);
        $download = $book->download + 1;
        $book->download = $download;
        $book->save();
        return response()->download(public_path($book->file));
    }
}
