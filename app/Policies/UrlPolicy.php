<?php

namespace App\Policies;

use App\Models\Url;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\Models\Url $url
     * @return bool
     */
    public function update(User $user, Url $url)
    {
        return $user->id === $url->user_id;
    }
}
