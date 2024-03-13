<?php

namespace Negarst\TaskManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    // public function authorize()
    // {
    //     return true;
    // }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:512',
            'due_date' => 'sometimes|date',
            'user_id' => 'sometimes|integer',
            'user_email' => 'sometimes|email',
            'user_role' => 'sometimes|string',
            'attachment' => 'sometimes|string', //???
            'is_completed' => 'sometimes|boolean'
        ];
    }
}
