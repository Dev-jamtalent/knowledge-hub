<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTempleteSubCat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_templete_cat_id',
        'templete_sub_category_name',
        'status',
    ];

    public function category(){
        return $this->belongsTo('App\Models\UserTempleteCat','user_templete_cat_id');
    }
}
