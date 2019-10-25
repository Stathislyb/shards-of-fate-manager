<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\SessionRepository as Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }
    
    /**
     * Determine whether the user can create trident session.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident session.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\SessionRepository  $Session
     * @return mixed
     */
    public function view(User $user, Session $Session, int $id)
    {
        return $user->id == $Session->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident session.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident session.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\SessionRepository  $Session
     * @return mixed
     */
    public function update(User $user, Session $Session, int $id)
    {
        return $user->id == $Session->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident session.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\SessionRepository  $Session
     * @return mixed
     */
    public function delete(User $user, Session $Session, int $id)
    {
        return $user->id == $Session->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident session.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\SessionRepository  $Session
     * @return mixed
     */
    public function restore(User $user, Session $Session, int $id)
    {
        return $user->id == $Session->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident session.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\SessionRepository  $Session
     * @return mixed
     */
    public function forceDelete(User $user, Session $Session, int $id)
    {
        return $user->id == $Session->findOrFail($id)->user_id;
    }
}
