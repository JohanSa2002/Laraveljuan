<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'graduation_project_id',
        'user_id',
        'parent_id',
        'section',
        'comment',
    ];

    public function project()
    {
        return $this->belongsTo(GraduationProject::class, 'graduation_project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(ProjectComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(ProjectComment::class, 'parent_id')->orderBy('created_at', 'asc');
    }
}