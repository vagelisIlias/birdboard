<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{   
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_a_project_can_have_tasks()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create(['body' => 'Test Test Task']);

        $project = Project::factory()->create(['owner_id' => $user->id]);

        $this->post($project->path() . '/tasks', ['body' => $task->body]);
        
        $this->get($project->path())
            ->assertSee($task->body);
    }

    public function test_a_user_can_add_tasks()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        
        $project = Project::factory()->create();

        $project->addTask("Test Task");

        $this->assertCount(1, $project->tasks);
    }

    public function test_a_task_requires_a_body()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create(['owner_id' => $user->id]);

        $task = Task::factory()->raw(['body' => 'Test Body']);

        $this->post($project->path() . '/tasks', $task)
            ->assertSee('body');
    }
}
