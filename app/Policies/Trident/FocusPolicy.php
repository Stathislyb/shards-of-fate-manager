<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\FocusRepository as Focus;
use Illuminate\Auth\Access\HandlesAuthorization;

class FocusPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident focus.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident focus.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusRepository  $Focus
     * @return mixed
     */
    public function view(User $user, Focus $Focus, int $id)
    {
        return $user->id == $Focus->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident focus.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident focus.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusRepository  $Focus
     * @return mixed
     */
    public function update(User $user, Focus $Focus, int $id)
    {
        return $user->id == $Focus->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident focus.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusRepository  $Focus
     * @return mixed
     */
    public function delete(User $user, Focus $Focus, int $id)
    {
        return $user->id == $Focus->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident focus.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusRepository  $Focus
     * @return mixed
     */
    public function restore(User $user, Focus $Focus, int $id)
    {
        return $user->id == $Focus->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident focus.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusRepository  $Focus
     * @return mixed
     */
    public function forceDelete(User $user, Focus $Focus, int $id)
    {
        return $user->id == $Focus->findOrFail($id)->user_id;
    }
}
