<?php

namespace App\Providers;

use App\Http\ViewComposers\LibraryComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        View::composer(
            'home.home', LibraryComposer::class
        );
        View::composer(
            'partials.library', LibraryComposer::class
        );
    }
}