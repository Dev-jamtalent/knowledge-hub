<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempleteTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'templete_id',
        'tag_name',
    ];
}
