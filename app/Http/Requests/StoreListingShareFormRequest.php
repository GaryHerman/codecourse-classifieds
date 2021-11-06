<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingShareFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'emails.*' => 'email|distinct|nullable',
            'emails.0' => 'required|email',
            'message'  => 'max:2000',
        ];
    }

    public function messages()
    {
        return [
            'emails.*.email'    => 'This is not a valid email address.',
            'emails.*.required' => 'This email address is required. Please enter a valid email address.',
        ];
    }
}
