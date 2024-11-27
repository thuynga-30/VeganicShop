<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Paginator
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

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
        Paginator::useBootstrap();
        view()->composer('*',function($view){
            $cats=Category::orderBy('name','ASC')->get();
            $products = Product::orderBy('id','ASC')->paginate(12); 
            //  $users = User::orderBy('id','ASC')->get(); 
            $users = User::where('role', 'user')->paginate(12);
            $origins = Product::select('origin')->distinct()->get();
            $oders = Order::orderBy('id','ASC')->paginate(4); 
            // $comments=Comment::orderBy('id','ASC')->get();
            $view->with(compact('cats','products','users','origins','oders'));

        });
    }
}
