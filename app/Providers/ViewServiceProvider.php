<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

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
        View::composer('admin.layouts.notifications', function ($view) {
            $notification =  DB::table('notifications')->where('type', 'LIKE', '%RepliedToThread')->get();
             $view->with('notification', $notification);
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
