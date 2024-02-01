<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ServiceFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'libelle' => [
                'required', 'max:255', 'min:2', 'string',
                Rule::unique('services')->ignore($this->route('service')),
            ],
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $errors = collect($validator->errors()->messages())->mapWithKeys(function ($messages, $field) {
            return [$field => implode(' ', $messages)];
        });

        throw new ValidationException($validator, response()->json(['errors' => $errors], 422));
    }

    public function messages(): array
    {
        return [
            'required' => 'Le libellé est obligatoire.',
            'max' => 'Le libellé ne doit pas dépasser :max caractères.',
            'min' => 'le libellé doit dépasser :min caractères.',
            'unique' => 'Ce libellé est déjà pris.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
