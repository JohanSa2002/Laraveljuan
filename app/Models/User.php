<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasFactory, Notifiable;

=======
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
>>>>>>> ef9f940bf4530f334665541a23c94f431fa3ddb1
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'role',
        'student_id',
        'career',
    ];

=======
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
>>>>>>> ef9f940bf4530f334665541a23c94f431fa3ddb1
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
=======
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
>>>>>>> ef9f940bf4530f334665541a23c94f431fa3ddb1
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

<<<<<<< HEAD
    public function graduationProjects()
    {
        return $this->hasMany(GraduationProject::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }
}
=======
    /**
     * Relación: un usuario puede subir muchos trabajos académicos.
     */
    public function trabajos()
    {
        return $this->hasMany(TrabajoAcademico::class);
    }
}
>>>>>>> ef9f940bf4530f334665541a23c94f431fa3ddb1
