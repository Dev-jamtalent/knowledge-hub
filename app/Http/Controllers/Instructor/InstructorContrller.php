<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;
use Auth;
class InstructorContrller extends Controller
{
    public function index(){
        return view('backend.pages.index');
    }
    public function edit(){
        return view('backend.pages.instructor.profile.edit');
    }
    public function update(Request $request){
        $save_image = Auth::user()->profile_photo_path;
        if ($request->image) {
            $image = $request->file('image');
            $name_gen = time() . '.' . $image->extension();
            Image::make($image)->resize(100, 100)->save('uploads/user/thambnail/'.$name_gen);
            $save_image = 'uploads/user/thambnail/'.$name_gen;
        }
        $user = User::findOrFail(Auth::user()->id)->update([
            'name'                      => $request->name,
            'profile_photo_path'        => $save_image,
            'description'               => $request->description,
            'phone'                     => $request->phone,
            'gender'                    => $request->gender,
            
        ]);
        return redirect()->back();
    }

    public function show($id){
        $instructor = Instructor::where('id',$id)->first();
        return view('fontend.pages.instructor',compact('instructor'));
    }
}
