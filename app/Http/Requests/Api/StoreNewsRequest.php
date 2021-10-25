<?php

namespace App\Http\Requests\Api;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->header('secretKey') == config('app.api_header_secret_key');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'website_id' => 'required|exists:websites,id',
            'title' => 'required|string|max:30',
            'content' => 'required|string|max:1000',
        ];
    }
}
