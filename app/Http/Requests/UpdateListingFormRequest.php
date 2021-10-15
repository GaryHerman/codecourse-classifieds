<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateListingFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required|max:255',
            'body'        => 'required|max:2000',
            'category_id' => [
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('usable', true);
                })
            ],
            'area_id' => [
                'required',
                Rule::exists('areas', 'id')->where(function ($query) {
                    $query->where('usable', true);
                })
            ]
        ];
    }
}
