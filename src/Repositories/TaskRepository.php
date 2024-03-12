<?php

namespace Vendor\TaskManager\Repositories;

use Vendor\TaskManager\Models\Task;

class TaskRepository extends BaseRepository
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function allForUser($userId, $status)
    {
        return $this->model->where('user_id', $userId)
        ->where('is_completed', $status == 'completed') 
        ->get();
    }
}
