<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlugarSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'txt_nome' => 'required',
            'txt_email' => 'required|email:rfc,dns',
        ];
    }
}
