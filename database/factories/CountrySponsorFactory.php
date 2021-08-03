<?php

namespace Database\Factories;

use App\Models\CountrySponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountrySponsorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CountrySponsor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->word,
        'sponsor_id' => $this->faker->randomDigitNotNull
        ];
    }
}
