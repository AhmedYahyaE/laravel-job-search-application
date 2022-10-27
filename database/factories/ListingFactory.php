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
            // !! Check 53:52 in https://www.youtube.com/watch?v=MYyJ4PuL4pY  !!
            // Check DatabaseSeeder.php file!!
            // Eloquent Factories :https://laravel.com/docs/9.x/eloquent-factories
            // Database Seeding: https://laravel.com/docs/9.x/seeding#using-model-factories

            // Note !!: WE DIDN'T INCLUDE THE `user_id` FIELD/COLUMN HERE! WE INCLUDED IN DatabaseSeeder.php file!!

            // The column names of the `listings` table
            // 'title'       => $this->faker->title(), // fake() which is FakerPHP, which is a PHP library to generate fake names, emails, hashed passwords, ...
            'title'       => $this->faker->sentence(), // fake() which is FakerPHP, which is a PHP library to generate fake names, emails, hashed passwords, ...
            'tags'        => 'laravel, api, backend',
            'company'     => $this->faker->company(),
            'email'       => $this->faker->companyEmail(),
            'website'     => $this->faker->url(),
            'location'    => $this->faker->city(),
            'description' => $this->faker->paragraph(5), // '5' means '5' paragraphs
        ];
    }
}
