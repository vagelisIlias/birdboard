<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_a_user_has_projects()
    {
        $user = User::factory()->create();
        
        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
