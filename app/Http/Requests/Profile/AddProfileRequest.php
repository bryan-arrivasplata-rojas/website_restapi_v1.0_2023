<?php

namespace App\Http\Requests\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "description"=>"required",
            "number"=>"required",
            "birthday"=>"required",
            "id"=>"required|unique:profile,id",
        ];
    }
}
