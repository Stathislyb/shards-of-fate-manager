<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\CharacterRepository as Character;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharacterPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident character.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident character.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\CharacterRepository  $Character
     * @return mixed
     */
    public function view(User $user, Character $Character, int $id)
    {
        return $user->id == $Character->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident character.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident character.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\CharacterRepository  $Character
     * @return mixed
     */
    public function update(User $user, Character $Character, int $id)
    {
        return $user->id == $Character->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident character.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\CharacterRepository  $Character
     * @return mixed
     */
    public function delete(User $user, Character $Character, int $id)
    {
        return $user->id == $Character->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident character.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\CharacterRepository  $Character
     * @return mixed
     */
    public function restore(User $user, Character $Character, int $id)
    {
        return $user->id == $Character->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident character.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\CharacterRepository  $Character
     * @return mixed
     */
    public function forceDelete(User $user, Character $Character, int $id)
    {
        return $user->id == $Character->findOrFail($id)->user_id;
    }
}
