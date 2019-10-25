<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\EpisodeRepository as Episode;
use Illuminate\Auth\Access\HandlesAuthorization;

class EpisodePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident episode.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident episode.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\EpisodeRepository  $Episode
     * @return mixed
     */
    public function view(User $user, Episode $Episode, int $id)
    {
        return $user->id == $Episode->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident episode.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident episode.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\EpisodeRepository  $Episode
     * @return mixed
     */
    public function update(User $user, Episode $Episode, int $id)
    {
        return $user->id == $Episode->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident episode.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\EpisodeRepository  $Episode
     * @return mixed
     */
    public function delete(User $user, Episode $Episode, int $id)
    {
        return $user->id == $Episode->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident episode.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\EpisodeRepository  $Episode
     * @return mixed
     */
    public function restore(User $user, Episode $Episode, int $id)
    {
        return $user->id == $Episode->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident episode.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\EpisodeRepository  $Episode
     * @return mixed
     */
    public function forceDelete(User $user, Episode $Episode, int $id)
    {
        return $user->id == $Episode->findOrFail($id)->user_id;
    }
}
