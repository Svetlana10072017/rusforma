<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void

 {

    // view()->share('orderCount', Cache::get('ordercount'));

            Paginator::useBootstrapFour();//для отображения страниц числами

    }
}
