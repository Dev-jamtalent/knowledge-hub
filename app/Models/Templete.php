<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templete extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
    public function templeteTags()
    {
        return $this->hasMany(TempleteTag::class);
    }
    public function templeteCategories()
    {
        return $this->hasMany(TempleteCategory::class);
    }
}
