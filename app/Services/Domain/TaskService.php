<?php

namespace App\Services\Domain;

use App\Http\Resources\Domain\TaskResource;
use App\Models\Domain\Task;

class TaskService
{
    // get all tasks for the authenticated user
    public static function all()
    {
        $tasks = Task::orderBy('updated_at', 'desc')->get();

        return TaskResource::collection($tasks);
    }

    // create a new task for the authenticated user
    public static function create($request)
    {
        $task = Task::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return TaskResource::make($task);
    }

    // update a task for the authenticated user
    public static function update($request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return TaskResource::make($task);
    }
}
