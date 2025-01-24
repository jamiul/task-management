<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_belongs_to_a_user()
    {
        $user = $this->createUser();
        $task = $this->createTask(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $task->user);
    }
}
