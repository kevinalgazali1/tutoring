<?php

namespace App\Policies;

use App\Models\User;
use App\Models\course;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */

    use HandlesAuthorization;

    public function update(User $user, Course $course)
    {
        return $user->isAdmin() || $user->id === $course->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan mengedit course ini.');
    }

    public function delete(User $user, Course $course)
    {
        return $user->isAdmin() || $user->id === $course->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan menghapus course ini.');
    }
}
