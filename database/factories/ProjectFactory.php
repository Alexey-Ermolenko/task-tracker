<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(100),
            'status' => Project::$status[Random::generate(1, '0-3')],
            'image' => 'https://via.placeholder.com/300x300',
            'description' => Str::random(300),
            'created_by' => User::all()->random()->id,
            'is_active' => $this->faker->numberBetween(0, 1),
            'company_id' => Company::all()->random()->id
        ];
    }
}
