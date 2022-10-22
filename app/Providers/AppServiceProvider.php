<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // For solving the Mass Assignment problem with the create() method using TWO ways: firstly, using the $fillable and $guarded properties inside the model, OR secondly, using the     \Illuminate\Database\Eloquent\Model::unguard();     inside boot() method inside the 'AppServiceProvider', check 2:21:53 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // Second way: (for the first way, check Listing.php model)
        \Illuminate\Database\Eloquent\Model::unguard();
    }
}
