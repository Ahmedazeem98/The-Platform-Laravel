<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        view()->share('categories', Category::all());
        view()->share('skills', Skill::all());
         view()->share('tags', Tag::all());
        view()->share('pages', Page::all());
    }
}
