<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\DataForNavbarController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');


        view()->composer('components.navbar', function ($view) {
            $controller = new DataForNavbarController();
            $pss_nan = $controller->pesanan_users();
            $theNotif = $controller->check_notif();
            $slug_id = $controller->get_market();
            $data_for_view = [
                'pss_nan' => $pss_nan,
                'theNotif' => $theNotif,
                'slug_id' => $slug_id
            ];

            $view->with($data_for_view);
        });

        view()->composer('components.sidebar_market', function ($view) {
            $controller = new DataForNavbarController();
            $slug_id = $controller->get_market_shoe_id();
            $foto_toko = $controller->get_market_profile();
            $data_for_view = [
                'slug_id' => $slug_id , 
                'foto_toko' => $foto_toko
            ];

            $view->with($data_for_view);
            
        });

        Gate::define('admin' , function(User $user){
           return $user->role == 666;
        });

        Gate::define('normies' , function(User $user){
           return $user->role == 1224;
        });
    }
}
