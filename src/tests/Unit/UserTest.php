<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // test user has many tasks
    public function test_user_has_many_tasks()
    {
        $user = $this->createUser();
        $this->createTask(['user_id' => $user->id]);

        $this->assertInstanceOf(Task::class, $user->tasks->first());
    }
}
