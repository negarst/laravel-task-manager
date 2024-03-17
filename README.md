# A task manager package for the Laravel framework enabling users to efficiently manage their tasks.

## Installation
Hi, thank you for using the Laravel Task Management Package.
Since this package is not published in the packagist, you can only use it locally.

First, clone the package from the [github repository](https://github.com/negarst/laravel-task-manager).


In your own laravel application add this part to your composer.json file. Note that you should replace the _PACKAGE-DIRECTORY_ according to your own directory where you cloned the package.

 ```php
  "repositories": [
    {
      "type": "path",
      "url": "_PACKAGE-DIRECTORY_/negarst/laravel-task-manager"
    }
  ]
```

Now, you can install the package via composer:

```bash
composer require negarst/laravel-task-manager
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="task-manager-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="task-manager-config"
```

This is the contents of the published config file:

```php
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
            'update_task' => true,
            'delete_task' => true,
        ],
    ],
    'mail' => [
        'mailgun'=> [
            'domain' => 'domain-name',
            'secret' => 'secret-parameter'
    ]],
];
```
## Usage
There are six endpoints for task management by your users:
```php
Route::middleware('access.control:list_tasks')
->get('/tasks/list/{status}');
Route::middleware('access.control:list_tasks')
->get('/tasks/filter/{user_id}/{status}');
Route::middleware('access.control:create_task')
->post('/tasks');
Route::middleware('access.control:see_task')
->get('/tasks/{id}');
Route::middleware('access.control:update_task')
->put('/tasks/{id}');
Route::middleware('access.control:delete_task')
->delete('/tasks/{id}');
```
You should customize the published config file roles accordingly. Also, you should set the mailgun credentials there for notification purposes.

You should include these parameters in your post request:
```php
[
    'title' => 'required|string|max:255',
    'description' => 'sometimes|string|max:512',
    'due_date' => 'required|date',
    'user_id' => 'required|integer',
    'user_email' => 'required|email',
    'user_role' => 'required|string',
    'attachment' => 'sometimes|string',
    'is_completed' => 'sometimes|boolean'
]
```

And include these parameters in your put request:
```php
[
    'title' => 'sometimes|string|max:255',
    'description' => 'sometimes|string|max:512',
    'due_date' => 'sometimes|date',
    'user_id' => 'sometimes|integer',
    'user_email' => 'sometimes|email',
    'user_role' => 'sometimes|string',
    'attachment' => 'sometimes|string',
    'is_completed' => 'sometimes|boolean'
]
```
## Testing

```bash
composer test
```

## Credits

- [Negar Ebrahimi](https://github.com/negarst)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
