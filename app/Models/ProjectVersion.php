<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'graduation_project_id',
        'version_number',
        'file_path',
        'changes_description',
        'uploaded_by',
    ];

    public function project()
    {
        return $this->belongsTo(GraduationProject::class, 'graduation_project_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}