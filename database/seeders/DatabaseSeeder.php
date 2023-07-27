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

        // \App\Models\User::factory(5)->create(); // '5' means insert '5' records    // check UserFactory.php

        // $user = \App\Models\User::factory()->create([ // check UserFactory.php
        $user = \App\Models\User::factory()->create([ // check UserFactory.php    // Here, we create a one user ONLY
            'name'  => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        // \App\Models\Listing::factory(6)->create(); // '6' means insert '6' records    // check ListingFactory.php
        \App\Models\Listing::factory(6)->create([
            'user_id' => $user->id
        ]);


        // Hard-coded Seeding:
        // \App\Models\User::factory()->create([
        //     'name'  => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}