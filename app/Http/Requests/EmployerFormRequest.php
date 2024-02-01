<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EmployerFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'matricule' => [
                'required', 'integer',
                Rule::unique('employers')->ignore($this->route('employer')),
            ],
            'prenom' => ['required'],
            'nom' => ['required'],
            'tel' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'salaire' => ['required', 'integer'],
            'dateNaiss' => ['required', 'date'],
            'service_id' => ['required', 'exists:services,id'],
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
            'required' => 'Le champ :attribute est obligatoire.',
            'integer' => 'Le champ :attribute doit être un entier.',
            'unique' => 'Le :attribute est déjà pris.',
            'email' => 'Le champ :attribute doit être une adresse email valide.',
            'max' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
            'date' => 'Le champ :attribute doit être une date valide.',
            'exists' => 'Le service sélectionné n\'existe pas.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
