<?php

namespace App\Providers;

use App\Category;
use App\ContactUS;
use App\Social;
use Illuminate\Support\ServiceProvider;
use App\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->share(['settings' => Settings::first(),
            'links' => Social::get(),
            'data' => ContactUS::get(),
            'categories' => Category::get()]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
