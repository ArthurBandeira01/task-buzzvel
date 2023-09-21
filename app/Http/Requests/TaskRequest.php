<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'attachmentFile' => 'required|file|mimes:jpg,png,webp,pdf,doc,txt'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'attachmentFile.required' => 'The attachment file field is required.',
            'attachmentFile.mimes' => 'The file must be one of the formats: jpg, png, webp, pdf or doc.',
        ];
    }
}
