<?php

namespace App\Providers;

use App\Repositories\Page\PageInterface;
use App\Repositories\Page\PageRepository;
use App\Repositories\Story\StoryInterface;
use App\Repositories\Story\StoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StoryInterface::class,StoryRepository::class);
        $this->app->bind(PageInterface::class,PageRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
