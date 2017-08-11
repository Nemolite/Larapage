<?php

namespace App\Providers;


use Blade;
use Response;
use DB;
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
        //
		 Blade::directive('datetime', function($expression) {
      return "<?php echo $expression ?>";
    });


        DB::listen(function($query){
            dump($query->sql);
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
