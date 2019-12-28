<?php

namespace App\Providers;

use Illuminate\Container\Container as App;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;

class TridentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //EDW THA PREPEI NA KANW GENERATED TOYS PROVIDERS MOY!!!
        \App::bind('App\Trident\Interfaces\Workflows\Logic\ChapterInterface',function($app){
            return new \App\Trident\Workflows\Logic\Chapter(
                new \App\Trident\Business\Logic\Chapter, 
                new \App\Trident\Workflows\Repositories\ChapterRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\ChapterRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\ChapterRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\CharacterInterface',function($app){
            return new \App\Trident\Workflows\Logic\Character(
                new \App\Trident\Business\Logic\Character, 
                new \App\Trident\Workflows\Repositories\CharacterRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\CharacterRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\CharacterRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\EpisodeInterface',function($app){
            return new \App\Trident\Workflows\Logic\Episode(
                new \App\Trident\Business\Logic\Episode, 
                new \App\Trident\Workflows\Repositories\EpisodeRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\EpisodeRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\EpisodeRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\FocusInterface',function($app){
            return new \App\Trident\Workflows\Logic\Focus(
                new \App\Trident\Business\Logic\Focus, 
                new \App\Trident\Workflows\Repositories\FocusRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\FocusRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\FocusRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\FocusGoalInterface',function($app){
            return new \App\Trident\Workflows\Logic\FocusGoal(
                new \App\Trident\Business\Logic\FocusGoal, 
                new \App\Trident\Workflows\Repositories\FocusGoalRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\FocusGoalRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\FocusGoalRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\NpcInterface',function($app){
            return new \App\Trident\Workflows\Logic\Npc(
                new \App\Trident\Business\Logic\Npc, 
                new \App\Trident\Workflows\Repositories\NpcRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\NpcRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\NpcRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\PlayerInterface',function($app){
            return new \App\Trident\Workflows\Logic\Player(
                new \App\Trident\Business\Logic\Player, 
                new \App\Trident\Workflows\Repositories\PlayerRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\PlayerRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\PlayerRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Workflows\Logic\SessionInterface',function($app){
            return new \App\Trident\Workflows\Logic\Session(
                new \App\Trident\Business\Logic\Session, 
                new \App\Trident\Workflows\Repositories\SessionRepository($app)
            );
        });
        \App::bind('App\Trident\Interfaces\Workflows\Repositories\SessionRepositoryInterface',function($app){
            return new \App\Trident\Workflows\Repositories\SessionRepository($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\ChapterInterface',function($app){
            return new \App\Trident\Business\Logic\Chapter($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\CharacterInterface',function($app){
            return new \App\Trident\Business\Logic\Character($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\EpisodeInterface',function($app){
            return new \App\Trident\Business\Logic\Episode($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\FocusInterface',function($app){
            return new \App\Trident\Business\Logic\Focus($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\FocusGoalInterface',function($app){
            return new \App\Trident\Business\Logic\FocusGoal($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\NpcInterface',function($app){
            return new \App\Trident\Business\Logic\Npc($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\PlayerInterface',function($app){
            return new \App\Trident\Business\Logic\Player($app);
        });
        \App::bind('App\Trident\Interfaces\Business\Logic\SessionInterface',function($app){
            return new \App\Trident\Business\Logic\Session($app);
        });
    }
}
