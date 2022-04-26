<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAudioSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Models\UserAudioCategory','user_audio_cat_id');
    }
}
