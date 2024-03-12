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
     * Add the is_highlighted field to any given query.
     *
     * @param Illuminate\Database\Query\Builder $query
     * @return Illuminate\Database\Query\Builder
     */
    protected function addHighlightField($query)
    {
        return $query->selectRaw('(due_date <= ?) as is_highlighted', [now()->addHours(24)]);
    }

    public function allForUser($userId, $status)
    {
        // Filter all of this user's tasks.
        $query = $this->model->where('user_id', $userId);

        switch ($status) {
            case null:
                break;
            case self::STATUS_PENDING:
                $query = $this->filterPendingTasks($query);
                break;
            case self::STATUS_COMPLETED:
                $query = $this->filterCompletedTasks($query);
                break;
            case self::STATUS_OVERDUE:
                $query = $this->filterOverdueTasks($query);
                break;
            default:
                throw new \InvalidArgumentException("Invalid status: {$status}");
        }

        $highlightedResult = $this->addHighlightField($query)->get();

        return $highlightedResult;
    }

    public function filterPendingTasks($query)
    {
        return $query->pending();
    }

    public function filterCompletedTasks($query)
    {
        return $query->completed();
    }

    public function filterOverdueTasks($query)
    {
        return $query->overdue();
    }
}
