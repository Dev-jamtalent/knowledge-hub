<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTempleteTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'templete_tag_name',
        'status',
    ];
}
