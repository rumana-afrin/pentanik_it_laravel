<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use Illuminate\Support\Facades\View;

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
       try {
            $connection = DB::connection()->getPdo();
            if ($connection){
                $allOptions = [];
                $allOptions['settings'] = Setting::all()->pluck('option_value', 'option_key')->toArray();
                config($allOptions);
            }
        } catch (\Exception $e) {
            //
        }

        //share pages data
     
         View::share('pages', Page::where('status', 'active')
                             ->where('menu_type', 'footer')
                             ->select('slug', 'title')
                             ->get());
    }
}
