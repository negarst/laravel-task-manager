<?php

namespace Negarst\TaskManager\Http\Controllers;

use Negarst\TaskManager\Http\Requests\StoreTaskRequest;
use Negarst\TaskManager\Http\Requests\UpdateTaskRequest;

interface TaskControllerInterface
{
    /**
     * Get all tasks for a specific user and status.
     *
     * @param int $user_id
     * @param string $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($user_id, $status);

    /**
     * Store a newly created task in storage.
     *
     * @param StoreTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTaskRequest $request);

    /**
     * Display the specified task.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function show($id);

    /**
     * Update the specified task in storage.
     *
     * @param UpdateTaskRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(UpdateTaskRequest $request, $id);

    /**
     * Remove the specified task from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id);
}
