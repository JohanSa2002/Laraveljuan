<?php

namespace App\Policies;

use App\Models\GraduationProject;
use App\Models\User;

class GraduationProjectPolicy
{
    public function view(User $user, GraduationProject $project): bool
    {
        return $user->isAdmin() || $user->id === $project->user_id;
    }

    public function update(User $user, GraduationProject $project): bool
    {
        return $user->id === $project->user_id && $project->status === 'pending';
    }

    public function delete(User $user, GraduationProject $project): bool
    {
        return $user->isAdmin() || ($user->id === $project->user_id && $project->status === 'pending');
    }
}