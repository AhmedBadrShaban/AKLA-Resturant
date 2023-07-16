<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\String_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contact_details>
 */
class contact_detailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address' => fake()->address(),
            'email' => fake()->safeEmail(),
//            'email_verified_at' => now(),
            'phone_number'=>fake()->phoneNumber(),

//             'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
