<?php

namespace Negarst\TaskManager\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Negarst\TaskManager\Http\Requests\StoreTaskRequest;
use Negarst\TaskManager\Http\Requests\UpdateTaskRequest;
use Negarst\TaskManager\Repositories\OwnerRepository;
use Negarst\TaskManager\Repositories\TaskRepository;

class TaskController
{
    protected $taskRepository;
    protected $ownerRepository;

    public function __construct(TaskRepository $taskRepository, OwnerRepository $ownerRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->ownerRepository = $ownerRepository;
    }

    public function index($user_id, $status)
    {
        $tasks = $this->taskRepository->allForUser($user_id, $status);
        return response()->json(['tasks' => $tasks]);
    }

    public function filter($status)
    {
        $tasks = $this->taskRepository->filterAll($status);
        return response()->json(['tasks' => $tasks]);
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        $this->ownerRepository->createOrUpdate($validated['user_id'], $validated['user_email']);

        $task = $this->taskRepository->create($validated);
        return response()->json(['task' => $task], 201);
    }

    public function show($id)
    {
        try {
            $task = $this->taskRepository->find($id);
        }
        catch(ModelNotFoundException $e) {
            throw new \Exception("Task with ID {$id} not found.");
        }
        
        return response()->json(['task' => $task]);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $validated = $request->validated();

        try {
            $task = $this->taskRepository->update($id, $validated);
            $this->ownerRepository->createOrUpdate($validated['user_id'], $validated['user_email']);
        }
        catch(ModelNotFoundException $e) {
            throw new \Exception("Task with ID {$id} not found.");
        }

        return response()->json(['task' => $task]);
    }

    public function destroy($id)
    {
        try {
            $this->taskRepository->delete($id);
        } 
        catch(ModelNotFoundException $e) {
            throw new \Exception("Task with ID {$id} not found.");
        }

        return response()->json(null, 204);
    }
}