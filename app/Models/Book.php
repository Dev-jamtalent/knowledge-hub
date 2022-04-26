<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructor_id', 
        'title', 
        'description', 
        'image', 
        'file', 
        'price', 
        'discount', 
        'category_id', 
    ];

    public function bookImages()
    {
        return $this->hasMany(BookImage::class);
    }
    public function bookTags()
    {
        return $this->hasMany(BookTag::class);
    }
}
