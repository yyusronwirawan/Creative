<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Metadata;
use App\Models\Admin_color;

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
        $metadata = Metadata::where('link',url()->current())->first();
        $color = Admin_color::first();
        view()->share('metadata', $metadata);
        view()->share('color', $color);
    }
}
