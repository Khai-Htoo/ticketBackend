<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'name' => 'required',
            'nrc_number' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'priority' => 'required',
            'date' => 'required',
        ];
    }
}
