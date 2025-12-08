<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduationProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'advisor',
        'career',
        'year',
        'status',
        'file_path',
        'keywords',
        'defense_date',
        'admin_comments',
    ];

    protected function casts(): array
    {
        return [
            'defense_date' => 'date',
            'year' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}