<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\ReputationItemRepository as ReputationItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReputationItemPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident reputationItem.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident reputationItem.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ReputationItemRepository  $ReputationItem
     * @return mixed
     */
    public function view(User $user, ReputationItem $ReputationItem, int $id)
    {
        return $user->id == $ReputationItem->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident reputationItem.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident reputationItem.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ReputationItemRepository  $ReputationItem
     * @return mixed
     */
    public function update(User $user, ReputationItem $ReputationItem, int $id)
    {
        return $user->id == $ReputationItem->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident reputationItem.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ReputationItemRepository  $ReputationItem
     * @return mixed
     */
    public function delete(User $user, ReputationItem $ReputationItem, int $id)
    {
        return $user->id == $ReputationItem->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident reputationItem.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ReputationItemRepository  $ReputationItem
     * @return mixed
     */
    public function restore(User $user, ReputationItem $ReputationItem, int $id)
    {
        return $user->id == $ReputationItem->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident reputationItem.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ReputationItemRepository  $ReputationItem
     * @return mixed
     */
    public function forceDelete(User $user, ReputationItem $ReputationItem, int $id)
    {
        return $user->id == $ReputationItem->findOrFail($id)->user_id;
    }
}
