<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{   
    use WithFaker, RefreshDatabase;
    /**
     * @test
     * You can take off the test if you wish and start with a_user_project etc
     */

    public function test_a_user_can_create_a_project()
    {   
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => 'Test Project Title',
            'description' => 'Test Project Description',
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');
        $this->assertDatabaseHas('projects', $attributes);
        $this->get('/projects')->assertSee($attributes['title'])
                            ->assertSee($attributes['description']);
    }

    public function test_a_project_requires_a_title()
    {   
        $this->withoutExceptionHandling();

        $attributes = Project::factory()->raw(['title' => 'Test Title']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    public function test_a_project_requires_a_description()
    {   
        $this->withoutExceptionHandling();

        $attributes = Project::factory()->raw(['description' => 'Test Description']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    public function test_a_user_can_show_a_project_with_title_and_description()
    {
        $this->withoutExceptionHandling(); 

        $project = Project::factory()->create();

        $this->get('/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
}
