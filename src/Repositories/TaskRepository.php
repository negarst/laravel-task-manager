<?php

namespace Vendor\TaskManager\Repositories;

use Vendor\TaskManager\Models\Task;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

     /**
     * Get all tasks with a specific status for a specific user.
     *
     * @param int $userId
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId, $status)
    {
        switch ($status) {
            case self::STATUS_PENDING:
                return $this->pendingTasksForUser($userId);
            case self::STATUS_COMPLETED:
                return $this->completedTasksForUser($userId);
            case self::STATUS_OVERDUED:
                return $this->overduedTasksForUser($userId);
            default:
                throw new \InvalidArgumentException("Invalid status: {$status}");
        }
    }
    
    /**
     * Get all pending tasks for a specific user.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function pendingTasksForUser($userId)
    {
        return $this->model->where('user_id', $userId)
            ->where('due_date', '>', now())
            ->where('is_completed', false)
            ->get();
    }

    /**
     * Get all completed tasks for a specific user.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function completedTasksForUser($userId)
    {
        return $this->model->where('user_id', $userId)
            ->where('is_completed', true)
            ->get();
    }

    /**
     * Get all overdued tasks for a specific user.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function overduedTasksForUser($userId)
    {
        return $this->model->where('user_id', $userId)
            ->where('due_date', '<', now())
            ->where('is_completed', false)
            ->get();
    }


}
