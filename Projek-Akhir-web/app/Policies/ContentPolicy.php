<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Content;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    /**
     * Create a new policy instance.
     */

     use HandlesAuthorization;
     
    public function __construct()
    {
        //
    }

    public function update(User $user, Content $content)
    {
        return $user->isAdmin() || $user->id === $content->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan mengedit content ini.');
    }

    public function delete(User $user, Content $content)
    {
        return $user->isAdmin() || $user->id === $content->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diizinkan menghapus content ini.');
    }
}
