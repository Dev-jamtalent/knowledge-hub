<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBookSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Models\UserBookCategory','user_book_cat_id');
    }
}
