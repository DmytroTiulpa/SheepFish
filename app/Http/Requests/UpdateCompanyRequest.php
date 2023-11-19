<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
        $companyId = $this->route('id'); // Получаем id компании из маршрута

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $companyId, // исключаем из проверки при обновлении
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url',
        ];
    }
}
