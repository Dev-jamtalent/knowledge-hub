<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bookImages()
    {
        return $this->hasMany(BookImage::class);
    }
    public function bookTags()
    {
        return $this->hasMany(BookTag::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
