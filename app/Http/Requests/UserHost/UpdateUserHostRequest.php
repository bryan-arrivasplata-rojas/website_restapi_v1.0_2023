<?php

namespace App\Http\Requests\UserHost;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUserHostRequest extends FormRequest
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
            "idHost"=>[
                "required",
                Rule::unique('userHost')->ignore($this->userhost->idUserHost,'idUserHost')
            ],
            "id"=>[
                "required",
                Rule::unique('userHost')->ignore($this->userhost->idUserHost,'idUserHost')
            ]
        ];
    }
}
