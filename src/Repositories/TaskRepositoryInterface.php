<?php

namespace Vendor\TaskManager\Repositories;

interface TaskRepositoryInterface
{
    /**
     * Get all tasks for a specific user with a given status.
     *
     * @param int $userId
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId, $status);

    // All possible task statuses are explicitely defined here.
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_OVERDUED = 'overdued';
}
