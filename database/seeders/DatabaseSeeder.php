<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // !! Check 53:52 in https://www.youtube.com/watch?v=MYyJ4PuL4pY  !!
        // Eloquent Factories :https://laravel.com/docs/9.x/eloquent-factories
        // Database Seeding: https://laravel.com/docs/9.x/seeding#using-model-factories

        // Note:: ALL THE FOLLOWING SEEDING RUNS WITH THE Artisan COMMAND: 'php artisan db:seed'
        \App\Models\User::factory(5)->create(); // '5' means insert '5' records    // check UserFactory.php

        // Hard-coded Seeding:
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Listing::factory(6)->create(); // '6' means insert '6' records    // check ListingFactory.php
    }
}
