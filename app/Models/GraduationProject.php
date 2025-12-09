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
        'keywords',
        'defense_date',
        'file_path',
        'status',
        'category',
        'score',
        'deadline',
        'plagiarism_percentage',
        'plagiarism_report',
        'version',
        'admin_comments',
    ];

    protected $casts = [
        'defense_date' => 'date',
        'deadline' => 'date',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ProjectComment::class)->whereNull('parent_id')->orderBy('created_at', 'desc');
    }

    public function allComments()
    {
        return $this->hasMany(ProjectComment::class)->orderBy('created_at', 'asc');
    }

    public function versions()
    {
        return $this->hasMany(ProjectVersion::class)->orderBy('version_number', 'desc');
    }

    public function evaluations()
    {
        return $this->hasMany(ProjectEvaluation::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'graduation_project_tag');
    }

    public function reminders()
    {
        return $this->hasMany(ProjectReminder::class);
    }

    // Métodos auxiliares
    public function getAverageScoreAttribute()
    {
        return $this->evaluations()->avg('total_score');
    }

    public function isOverdue()
    {
        return $this->deadline && $this->deadline->isPast() && $this->status === 'pending';
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'in_review' => 'blue',
            'requires_corrections' => 'orange',
            'approved_with_observations' => 'green',
            'approved' => 'green',
            'rejected' => 'red',
            default => 'gray',
        };
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Pendiente',
            'in_review' => 'En Revisión',
            'requires_corrections' => 'Requiere Correcciones',
            'approved_with_observations' => 'Aprobado con Observaciones',
            'approved' => 'Aprobado',
            'rejected' => 'Rechazado',
            default => 'Desconocido',
        };
    }
}