<?php

namespace App\Http\Requests\Project;

use App\Enum\InstallationType;
use App\Enum\UF;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => 'required|string|max:255',
            'state' => [Rule::enum(UF::class)],
            'customer_document' => 'required|cpf_ou_cnpj',
            'installation_type' => [Rule::enum(InstallationType::class)]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 400));
    }
}
