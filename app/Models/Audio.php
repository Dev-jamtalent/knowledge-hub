<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function audioTags()
    {
        return $this->hasMany(AudioTag::class);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
