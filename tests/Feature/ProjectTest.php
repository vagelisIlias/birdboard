<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
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

    public function test_guest_cannot_create_projects()
    {   
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $attributes = Project::factory()->raw([
            'title' => 'Test title is true', 
            'description' => 'Test description is true'
        ]);
        
        $this->post('/projects', $attributes)
            ->assertSessionHasErrors(['title', 'description'])
            ->assertRedirect('/projects');        
    }

    // public function test_guest_can_not_view_projects() 
    // {
    //     $this->get('/projects')
    //         ->assertRedirect('login');
    // }

    // public function test_guest_cannot_view_a_single_project()
    // {
    //     $project = Project::factory()->create();
    //     $this->get($project->path())
    //         ->assertRedirect('login');
    // }

    public function test_a_user_can_create_a_project()
    {   
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $attributes = [
            'title' => 'Test Project Title',
            'description' => 'Test Project Description',
            'owner_id' => $user->id,
        ];
        $this->actingAs($user);
        $this->post('/projects', $attributes)->assertRedirect('/projects');
        $this->assertDatabaseHas('projects', $attributes);
        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function test_a_project_requires_a_title()
    {   
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $attributes = Project::factory()->raw(['title' => 'Test Title']);
        
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    public function test_a_project_requires_a_description()
    {   
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $attributes = Project::factory()->raw(['description' => 'Test Description']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    public function test_a_user_can_view_their_project()
    {   
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $project = Project::factory()->create(['owner_id' => $user->id]);
        $this->actingAs($user);
       
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function test_an_authedicated_user_cannot_view_other_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }

    public function test_it_belongs_to_an_owner()
    {   
        $this->withoutExceptionHandling();
        $project = Project::factory()->create(); 
        $this->assertInstanceOf(User::class, $project->owner);
    }
}