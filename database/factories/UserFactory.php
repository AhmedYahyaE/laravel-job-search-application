<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // !! Check 53:52 in https://www.youtube.com/watch?v=MYyJ4PuL4pY  !!
            // Check DatabaseSeeder.php file!!
            // Eloquent Factories :https://laravel.com/docs/9.x/eloquent-factories
            // Database Seeding: https://laravel.com/docs/9.x/seeding#using-model-factories
            // When using Model Factories, if you want to (define hard-coded factories values) create a certain field/column (e.g. user) with certain field/column values you want them to be exactly a certain way (Hard-coded Database Seeding), inside the create() method of the factory, use an array and type in your desired fields/columns and their values. Check 3:52:38 in https://www.youtube.com/watch?v=MYyJ4PuL4pY

            // The column names of the `users` table
            'name'              => fake()->name(), // fake() which is FakerPHP, which is a PHP library to generate fake names, emails, hashed passwords, ...
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password hash
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
