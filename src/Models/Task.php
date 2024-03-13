<?php

namespace Negarst\TaskManager\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'attachment',
        'due_date',
        'is_completed',
    ];

    public function scopeCompleted($query)
    {
        return $query->where('is_completed', true);
    }

    public function scopePending($query)
    {
        return $query->where('due_date', '>', now())
        ->where('is_completed', false);
    }

    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now())
        ->where('is_completed', false);
    }
}
