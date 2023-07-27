<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Check DatabaseSeeder.php file
            'title'       => $this->faker->sentence(), // fake() which is FakerPHP, which is a PHP library to generate fake names, emails, hashed passwords, ...
            'tags'        => 'laravel, api, backend',
            'company'     => $this->faker->company(),
            'email'       => $this->faker->companyEmail(),
            'website'     => $this->faker->url(),
            'location'    => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
