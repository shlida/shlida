<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'PROFILE' => \App\Models\User::class,
            'TOPIC' => \App\Models\Topic::class,
            'COMMENT' => \App\Models\Comment::class,
            'SWATCH' => \App\Models\Swatch::class,
            'EVENT' => \App\Models\Event::class
        ]);
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
