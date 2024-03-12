<?php

namespace Vendor\TaskManager\Models;

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
}
