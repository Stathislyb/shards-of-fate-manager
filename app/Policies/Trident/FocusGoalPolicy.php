<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\FocusGoalRepository as FocusGoal;
use Illuminate\Auth\Access\HandlesAuthorization;

class FocusGoalPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident focusGoal.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the trident focusGoal.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusGoalRepository  $FocusGoal
     * @return mixed
     */
    public function view(User $user, FocusGoal $FocusGoal, int $id)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident focusGoal.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the trident focusGoal.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusGoalRepository  $FocusGoal
     * @return mixed
     */
    public function update(User $user, FocusGoal $FocusGoal, int $id)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the trident focusGoal.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusGoalRepository  $FocusGoal
     * @return mixed
     */
    public function delete(User $user, FocusGoal $FocusGoal, int $id)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the trident focusGoal.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusGoalRepository  $FocusGoal
     * @return mixed
     */
    public function restore(User $user, FocusGoal $FocusGoal, int $id)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the trident focusGoal.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\FocusGoalRepository  $FocusGoal
     * @return mixed
     */
    public function forceDelete(User $user, FocusGoal $FocusGoal, int $id)
    {
        return true;
    }
}
