<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Base validation rules
            'api_key' => 'required|string',
            'timestamp' => 'required|integer',
            'signature' => 'required|string',
        ];
    }

    protected function prepareForValidation()
    {
        // Add any request preparation logic here
    }
} 