<?php

namespace Negarst\TaskManager\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'id',
        'email',
    ];
}