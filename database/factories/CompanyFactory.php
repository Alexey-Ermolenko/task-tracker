<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
            'image' => 'https://via.placeholder.com/300x300',
            'description' => Str::random(300),
            'created_by' => User::all()->random()->id,
            'is_active' => $this->faker->numberBetween(0, 1)
        ];
    }
}
