<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\PlayerRepository as Player;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident player.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident player.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\PlayerRepository  $Player
     * @return mixed
     */
    public function view(User $user, Player $Player, int $id)
    {
        return $user->id == $Player->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident player.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident player.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\PlayerRepository  $Player
     * @return mixed
     */
    public function update(User $user, Player $Player, int $id)
    {
        return $user->id == $Player->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident player.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\PlayerRepository  $Player
     * @return mixed
     */
    public function delete(User $user, Player $Player, int $id)
    {
        return $user->id == $Player->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident player.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\PlayerRepository  $Player
     * @return mixed
     */
    public function restore(User $user, Player $Player, int $id)
    {
        return $user->id == $Player->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident player.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\PlayerRepository  $Player
     * @return mixed
     */
    public function forceDelete(User $user, Player $Player, int $id)
    {
        return $user->id == $Player->findOrFail($id)->user_id;
    }
}
