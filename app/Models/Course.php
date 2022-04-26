<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructor_id',
        'title',
        'description',
        'image',
        'video',
        'file',
        'price',
        'discount',
        'category_id',
        'url',
        'link',
        'link_g_drive',
        'link_dropbox',
        'link_embed',
        'privacy',
        'language',
        'slug',
        'download',
    ];
    public function courseTags()
    {
        return $this->hasMany(CourseTag::class);
    }
    public function courseCategories()
    {
        return $this->hasMany(CourseCategory::class);
    }
}
