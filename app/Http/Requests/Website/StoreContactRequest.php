<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

// TODO: authorization
class StoreContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'min:5', 'max:15'],
            'subject' => ['required', 'string', 'min:5', 'max:255'],
            'body' => ['required', 'string', 'min:50', 'max:5000'],
            'ip_address' => ['required', 'ip']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ip_address' => request()->ip()
        ]);
    }
}
