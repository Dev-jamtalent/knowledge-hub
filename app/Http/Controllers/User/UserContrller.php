<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;
use Auth;
class UserContrller extends Controller
{
    public function index(){
        return view('backend.pages.index');
    }
    public function userDetails(){
        return view('backend.pages.user.account-details');
    }
    public function accountSetting(){
        return view('backend.pages.user.account-setting');
    }
    public function modeUser(){
        $user = User::findOrFail(Auth::user()->id)->update([
            'user_role_id' => 2,
        ]);
        return redirect()->route('user.dashboard');
    }

    public function changePassword(){
        return view('fontend.pages.user.change-pass');
    }

    public function updatePassword(Request $request){
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

    public function updateAccDetailAjax(Request $request){
        $save_image = Auth::user()->profile_photo_path;
        if ($request->image) {
            $image = $request->file('image');
            $name_gen = time() . '.' . $image->extension();
            Image::make($image)->resize(100, 100)->save('uploads/user/thambnail/'.$name_gen);
            $save_image = 'uploads/user/thambnail/'.$name_gen;
        }
        $data = User::findOrFail(Auth::user()->id)->update([
            'name'                              => $request->name,
            'birth_date'                        => $request->birth_date,
            'birth_month'                       => $request->birth_month,
            'birth_year'                        => $request->birth_year,
            'profession'                        => $request->profession,
            'profile_photo_path'                => $save_image,
            'gender'                            => $request->gender,
            'updated_at'                        => Carbon::now(),
        ]);

        return redirect()->back();
    }

}
