<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\NpcRepository as Npc;
use Illuminate\Auth\Access\HandlesAuthorization;

class NpcPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident npc.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident npc.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\NpcRepository  $Npc
     * @return mixed
     */
    public function view(User $user, Npc $Npc, int $id)
    {
        return $user->id == $Npc->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident npc.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident npc.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\NpcRepository  $Npc
     * @return mixed
     */
    public function update(User $user, Npc $Npc, int $id)
    {
        return $user->id == $Npc->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident npc.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\NpcRepository  $Npc
     * @return mixed
     */
    public function delete(User $user, Npc $Npc, int $id)
    {
        return $user->id == $Npc->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident npc.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\NpcRepository  $Npc
     * @return mixed
     */
    public function restore(User $user, Npc $Npc, int $id)
    {
        return $user->id == $Npc->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident npc.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\NpcRepository  $Npc
     * @return mixed
     */
    public function forceDelete(User $user, Npc $Npc, int $id)
    {
        return $user->id == $Npc->findOrFail($id)->user_id;
    }
}
