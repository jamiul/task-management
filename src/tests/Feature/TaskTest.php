<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    private $task;

    public function setUp(): void
    {
        parent::setUp();

        // Given we have sign in user
        $this->signIn();
        $this->task = $this->createTask([
            'title' => 'Complete the task manager app',
            'user_id' => auth()->user()->id
        ]);
    }

    // test a user can fetch all tasks
    public function test_an_authenticated_user_can_fetch_tasks()
    {
        // fetch all tasks
        $response = $this->getJson(route('tasks.index'))->json();

        // assert that the response contains the task
        $this->assertEquals(1, count($response));
        $this->assertEquals($this->task->title, $response[0]['title']);
    }

    // test a user can create a task
    public function test_an_authenticated_user_can_create_a_task()
    {
        $task = Task::factory()->make();

        // Send a POST request to create the task
        $response = $this->postJson(route('tasks.store'), [
            'title' => $task->title
        ]);

        $this->assertEquals(
            $task['title'],
            $response['title']
        );
    }


    // test a user can update a task
    public function test_an_authenticated_user_can_update_a_task()
    {
        // update the task status to completed
        $updateTask = [
            'title' => $this->task->title,
            'status' => Task::STATUS_COMPLETED
        ];

        // update the task
        $this->patchJson(route('tasks.update', $this->task->id), $updateTask)->assertOk();

        // assert that the task was updated
        $this->assertDatabaseHas('tasks', ['status' => Task::STATUS_COMPLETED]);
    }

    // test a user can delete a task
    public function test_an_authenticated_user_can_delete_a_task()
    {
        // delete the task
        $this->deleteJson(route('tasks.destroy' , $this->task->id))->assertNoContent();

        // Assert that the task still exists in the database but is soft-deleted
        $this->assertSoftDeleted('tasks', ['id' => $this->task->id]);
    }
}