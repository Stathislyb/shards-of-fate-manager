<?php

namespace App\Policies\Trident;

use App\User;
use App\Trident\Workflows\Repositories\ChapterRepository as Chapter;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChapterPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    /**
     * Determine whether the user can create trident chapter.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can view the trident chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ChapterRepository  $Chapter
     * @return mixed
     */
    public function view(User $user, Chapter $Chapter, int $id)
    {
        return $user->id == $Chapter->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can create trident chapter.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return \Auth::check();
    }

    /**
     * Determine whether the user can update the trident chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ChapterRepository  $Chapter
     * @return mixed
     */
    public function update(User $user, Chapter $Chapter, int $id)
    {
        return $user->id == $Chapter->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can delete the trident chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ChapterRepository  $Chapter
     * @return mixed
     */
    public function delete(User $user, Chapter $Chapter, int $id)
    {
        return $user->id == $Chapter->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can restore the trident chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ChapterRepository  $Chapter
     * @return mixed
     */
    public function restore(User $user, Chapter $Chapter, int $id)
    {
        return $user->id == $Chapter->findOrFail($id)->user_id;
    }

    /**
     * Determine whether the user can permanently delete the trident chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Trident\Workflows\Repositories\ChapterRepository  $Chapter
     * @return mixed
     */
    public function forceDelete(User $user, Chapter $Chapter, int $id)
    {
        return $user->id == $Chapter->findOrFail($id)->user_id;
    }
}
