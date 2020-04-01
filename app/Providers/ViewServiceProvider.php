<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('user.layouts.sidebar-book', function ($view) {
            $categories = Category::all();
            $publishers = Publisher::all();
            $view->with('categories', $categories);
            $view->with('publishers', $publishers);
        });
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
