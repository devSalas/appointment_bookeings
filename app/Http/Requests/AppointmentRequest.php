<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "details" => "string",
            "date" => "required|date",
            "start_hour" => "required|date_format:Y-m-d H:i:s", 
            "end_hour" => "nullable|date_format:Y-m-d H:i:s", 
            "client_id" => "required|integer", 
        ];
    }
}
