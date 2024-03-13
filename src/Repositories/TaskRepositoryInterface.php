<?php

namespace Negarst\TaskManager\Repositories;

interface TaskRepositoryInterface
{
    /**
     * Get all tasks with a specific status or no status for a specific user.
     *
     * @param int $userId
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId, $status);

    /**
     * Query all pending tasks.
     *
     * @param Illuminate\Database\Query\Builder $query
     * @return Illuminate\Database\Query\Builder
     */
    public function filterPendingTasks($query);

    /**
     * Query all completed tasks.
     *
     * @param Illuminate\Database\Query\Builder $query
     * @return Illuminate\Database\Query\Builder
     */
    public function filterCompletedTasks($query);

    /**
     * Query all overdued tasks.
     *
     * @param Illuminate\Database\Query\Builder $query
     * @return Illuminate\Database\Query\Builder
     */
    public function filterOverdueTasks($query);

    // All possible task statuses are explicitely defined here.
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_OVERDUE = 'overdue';
}
