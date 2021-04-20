<?php

namespace App\Policies;

use App\Models\Url;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given url can be updated by the user.

     * @return bool returns true if user id matches url id
     */
    public function update(User $user, Url $url)
    {
        return $user->id === $url->user_id;
    }
}
