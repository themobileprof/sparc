<?php

namespace Database\Factories;

use App\Models\ContextEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContextEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContextEntry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->randomDigitNotNull,
        'context_id' => $this->faker->randomDigitNotNull,
        'year' => $this->faker->word,
        'content' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
