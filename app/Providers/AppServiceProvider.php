<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Direction;
use App\Models\Project;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //Направления деятельности и объекты и для меню
        $menu_directions = Direction::limit(6)->get();

        $project = Project::limit(6)->get();
        View::share('menu_directions', $menu_directions);
        View::share('menu_projects', $project);
    }
}
