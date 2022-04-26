<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempleteCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'templete_id',
        'category_name',
    ];
}
