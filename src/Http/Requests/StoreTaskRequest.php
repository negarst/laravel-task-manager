<?php

namespace Negarst\TaskManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    // public function authorize()
    // {
    //     return true;
    // }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'sometimes|string|max:512',
            'due_date' => 'required|date',
            'user_id' => 'required|integer',
            'user_email' => 'required|email',
            'user_role' => 'required|string',
            'attachment' => 'sometimes|string', //???
            'is_completed' => 'sometimes|boolean'
        ];
    }
}
