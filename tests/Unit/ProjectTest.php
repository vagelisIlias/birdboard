<?php
use App\Models\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function test_it_has_a_path()
    {   
        $project = new Project;

        $this->assertEquals("/projects/{$project->id}", $project->path());
    }
}
