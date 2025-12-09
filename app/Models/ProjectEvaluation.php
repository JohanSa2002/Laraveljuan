<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'graduation_project_id',
        'evaluator_id',
        'content_score',
        'methodology_score',
        'presentation_score',
        'originality_score',
        'total_score',
        'feedback',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($evaluation) {
            $evaluation->total_score = 
                ($evaluation->content_score ?? 0) +
                ($evaluation->methodology_score ?? 0) +
                ($evaluation->presentation_score ?? 0) +
                ($evaluation->originality_score ?? 0);
        });
    }

    public function project()
    {
        return $this->belongsTo(GraduationProject::class, 'graduation_project_id');
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }
}