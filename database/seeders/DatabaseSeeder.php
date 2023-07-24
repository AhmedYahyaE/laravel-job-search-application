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

        // Note:: ALL THE FOLLOWING SEEDING RUNS USING THE Artisan COMMAND: 'php artisan db:seed'
        // \App\Models\User::factory(5)->create(); // '5' means insert '5' records    // check UserFactory.php

        // When using Model Factories, if you want to (define hard-coded factories values) create a certain field/column (e.g. user) with certain field/column values you want them to be exactly a certain way (Hard-coded Database Seeding), inside the create() method of the factory, use an array and type in your desired fields/columns and their values. Check 3:52:38 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // $user = \App\Models\User::factory()->create([ // check UserFactory.php
        $user = \App\Models\User::factory()->create([ // check UserFactory.php    // Here, we create a one user ONLY
            'name'  => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        // When using Model Factories, if you want to (define hard-coded factories values) create a certain field/column (e.g. user) with certain field/column values you want them to be exactly a certain way (Hard-coded Database Seeding), inside the create() method of the factory, use an array and type in your desired fields/columns and their values. Check 3:52:38 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
        // \App\Models\Listing::factory(6)->create(); // '6' means insert '6' records    // check ListingFactory.php
        \App\Models\Listing::factory(6)->create([ // NOTE !!: '6' means insert '6' records (`listings`) AND MAKE ALL OF THEM THEIR 'user_id' IS THAT $user->id (Note that in ListingFactory.php, we didn't include the `user_id` field/column in the first place!)    // check ListingFactory.php
            'user_id' => $user->id // ASSIGN THAT SPECIFIC 'John Doe''s `user_id` FOR ALL THE SIX `listings`!!! (i.e. the 6 created `listings` all will have the same `user_id` value which is 1 which is of John Doe's `id` in `users` table)    // Note that in ListingFactory.php, we didn't include the `user_id` field/column in the first place!
        ]);


        // Hard-coded Seeding:
        // \App\Models\User::factory()->create([
        //     'name'  => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
