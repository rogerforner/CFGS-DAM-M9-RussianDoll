<?php

namespace App\Providers;

use App\Matriushka;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache', function ($expression) {
            return "<?php if(! App\Matriushka::setUp($expression)) { ?>";
        });

        Blade::directive('endcache', function () {
            return "<?php } echo App\Matriushka::tearDown() ?>";
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
