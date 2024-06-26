<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWargaRequest extends FormRequest
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
            "id" => "required",
            "name" => "required|string",
            "rt" => "required|in:RT01,RT02,RT03,RT04,RT05",
            "rw" => "required|in:RW01,RW02,RW03,RW04,RW05,RW06,RW07,RW08,RW09,RW10,RW11,RW12,RW13,RW14,RW15,RW16,RW17,RW18,RW19,RW20,RW21",
            "status" => "required|in:menetap,ngontrak"
        ];
    }
}
