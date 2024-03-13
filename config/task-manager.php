<?php

return [
    'roles' => [
        'admin' => [
            'create_task' => true,
            'see_task' => true,
            'list_tasks' => true,
            'update_task' => true,
            'delete_task' => true,
        ],
        'manager' => [
            'create_task' => true,
            'see_task' => true,
            'list_tasks' => true,
            'update_task' => true,
            'delete_task' => false, // Managers cannot delete tasks
        ],
        'user' => [
            'create_task' => true,
            'see_task' => true,
            'list_tasks' => false,
            'update_task' => false, // Users cannot update tasks
            'delete_task' => false, // Users cannot delete tasks
        ],
        'owner' => [
            'create_task' => true,
            'see_task' => true,
            'list_tasks' => true,
            'update_task' => true, // Users cannot update tasks
            'delete_task' => true, // Users cannot delete tasks
        ],
    ],
    'mail' => [
        'mailgun'=> [
            'domain' => 'domain-name',
            'secret' => 'secret-parameter'
    ]],
];
