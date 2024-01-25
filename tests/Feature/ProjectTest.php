<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{   
    use WithFaker, RefreshDatabase;
    /**
     * @test
     */
    public function a_user_can_create_a_project()
    {   
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
        ];

        // Create a project
        $this->post('/projects', $attributes)->assertRedirect('/projects');

        // // Check if the project details are in the database
        $this->assertDatabaseHas('projects', $attributes);

        // Perform a GET request after creating the project
        $this->get('/projects')->assertSee($attributes['title'])
                            ->assertSee($attributes['description']);
    }
}
