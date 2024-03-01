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

    public function test_a_task_can_be_updated()
    {   
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = auth()->user()->projects()->create(
            Project::factory()->raw()
        );
        $task = $project->addTask('Test Task');
    
        $this->patch($project->path() . '/tasks/' . $task->id, [
            'body' => 'Task Updated',
            'completed' => true,
        ]);
        
        $this->assertDatabaseHas('tasks', [
            'body' => 'Task Updated',
            'completed' => true,
        ]);        
    }

    public function test_only_the_owner_can_have_tasks_on_their_projects()
    {    
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();

        $this->post($project->path() . '/tasks', ['body' => 'Test Task'])
            ->assertStatus(403);
        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task']);
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

    public function test_a_user_can_update_tasks()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $project = Project::factory()->create();
        $task = Task::factory()->create();

        $project->addTask("Test Task");

        $this->patch($project->path() . '/tasks/' . $task->id, ['body' => 'Test Task updated successfully'])
            ->assertStatus(403);
    }

    public function test_a_task_requires_a_body()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();

        $task = Task::factory()->raw(['body' => 'Test Body']);

        $this->post($project->path() . '/tasks', $task)
            ->assertSee('body');
    }
}
