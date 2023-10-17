<?php

use App\Enums\TaskStatusEnum;
use App\Models\Domain\Task;
use App\Models\Auth\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
    $this->taskData = [
        'title' => 'Sample Task',
        'status' => TaskStatusEnum::PENDING,
        'description' => 'This is a sample description',
    ];
});

// index
it('fetches all tasks', function () {
    Task::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->getJson('/api/v1/tasks');

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully retrieved tasks.')
        ->assertJsonStructure(['data', 'message'])
        ->assertJsonCount(3, 'data');
});

// store
it('creates a new task', function () {
    $response = $this->postJson('/api/v1/tasks', $this->taskData);

    $response->assertCreated()
        ->assertJsonPath('message', 'Successfully created task.')
        ->assertJsonPath('data.title', $this->taskData['title']);
});

// show
it('fetches a specific task', function () {
    $task = Task::factory()->create(['user_id' => $this->user->id]);

    $response = $this->getJson("/api/v1/tasks/{$task->id}");

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully retrieved task.')
        ->assertJsonPath('data.title', $task->title);
});

// update
it('updates a task', function () {
    $task = Task::factory()->create(['user_id' => $this->user->id]);
    $updatedData = [
        'title' => 'Updated Task',
        'status' => TaskStatusEnum::COMPLETED,
    ];

    $response = $this->putJson("/api/v1/tasks/{$task->id}", $updatedData);

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully updated task.')
        ->assertJsonPath('data.title', $updatedData['title']);
});

// destroy
it('deletes a task', function () {
    $task = Task::factory()->create(['user_id' => $this->user->id]);

    $response = $this->deleteJson("/api/v1/tasks/{$task->id}");

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully deleted task.');
});
