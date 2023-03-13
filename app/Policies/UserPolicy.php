<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function is_admin(User $user): bool
    {
        return $user->role == 'admin';
    }
}
