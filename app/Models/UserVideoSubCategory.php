<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideoSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Models\UserVideoCategory','user_video_cat_id');
    }
}
