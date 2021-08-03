<?php

namespace Database\Factories;

use App\Models\PurchasingFunction;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchasingFunctionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchasingFunction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->randomDigitNotNull,
        'column' => $this->faker->word,
        'financial_mgmt' => $this->faker->word,
        'benefits_spec' => $this->faker->word,
        'contracting' => $this->faker->word,
        'provider_payment' => $this->faker->word,
        'monitoring' => $this->faker->word,
        'notes' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
