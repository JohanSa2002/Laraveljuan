<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'content',
        'category',
        'image_path',
        'is_active',
    ];
}
