<?php

namespace Project\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // directive blade for working with variables
        //example @set($x,1); @set($x,$x+1)
       Blade::directive('set',function ($arg){
        list($name,$val) = explode(',',$arg);
        return "<?php $name = $val ?>";
    });
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
