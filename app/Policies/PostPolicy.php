<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function store(User $user)
    {
        return count(array_intersect(["ADMIN"], json_decode($user->roles)));
    }

    public function update(User $user)
    {
        return count(array_intersect(["ADMIN"], json_decode($user->roles)));
    }

    public function delete(User $user)
    {
        return count(array_intersect(["ADMIN"], json_decode($user->roles)));
    }
}
