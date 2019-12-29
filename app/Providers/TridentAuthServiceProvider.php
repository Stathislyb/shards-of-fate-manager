<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class TridentAuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Trident\Workflows\Repositories\ChapterRepository' => 'App\Policies\Trident\ChapterPolicy',
        'App\Trident\Workflows\Repositories\CharacterRepository' => 'App\Policies\Trident\CharacterPolicy',
        'App\Trident\Workflows\Repositories\EpisodeRepository' => 'App\Policies\Trident\EpisodePolicy',
        'App\Trident\Workflows\Repositories\FocusRepository' => 'App\Policies\Trident\FocusPolicy',
        'App\Trident\Workflows\Repositories\FocusGoalRepository' => 'App\Policies\Trident\FocusGoalPolicy',
        'App\Trident\Workflows\Repositories\NpcRepository' => 'App\Policies\Trident\NpcPolicy',
        'App\Trident\Workflows\Repositories\PlayerRepository' => 'App\Policies\Trident\PlayerPolicy',
        'App\Trident\Workflows\Repositories\SessionRepository' => 'App\Policies\Trident\SessionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
