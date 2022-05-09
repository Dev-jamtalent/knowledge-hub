<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function videoTags()
    {
        return $this->hasMany(VideoTag::class);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    

}
