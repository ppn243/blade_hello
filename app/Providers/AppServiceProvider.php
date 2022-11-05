<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Product;

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
        view()->composer('page.header', function ($view) {
            $loai_sp = ProductType::all();
            $view->with('loai_sp', $loai_sp);
        });
        view()->composer('page.product_type', function ($view) {
            $product_new = Product::where('new', 1)->orderBy('id','DESC')->skip(1)->take(8)->get();
            $view->with('product_new', $product_new);
        });
    }
}
