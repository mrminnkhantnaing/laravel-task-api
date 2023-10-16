<?php

namespace App\Http\Controllers\Domain;

use App\Models\Domain\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\Domain\TaskStoreRequest;
use App\Http\Resources\Domain\TaskResource;
use App\Services\ResponseService;
use App\Services\Domain\TaskService;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ResponseService::success(TaskService::all(), 'Successfully retrieved tasks.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        return ResponseService::success(TaskService::create($request), 'Successfully created task.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return ResponseService::success(TaskResource::make($task), 'Successfully retrieved task.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStoreRequest $request, Task $task)
    {
        return ResponseService::success(TaskService::update($request, $task), 'Successfully updated task.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return ResponseService::success($task->delete(), 'Successfully deleted task.');
    }
}
