<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'owner_id' => User::factory()->create()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
}