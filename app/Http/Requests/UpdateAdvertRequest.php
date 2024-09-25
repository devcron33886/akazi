<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('advert_edit');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'integer',
                'required',
            ],
            'title' => [
                'string',
                'required',
                'unique:adverts,title,' . request()->route('advert')->id,
            ],
            'body' => [
                'required',
            ],
            'deadline' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'location' => [
                'string',
                'required',
            ],
            'sector' => [
                'string',
                'required',
            ],
            'education_level' => [
                'string',
                'nullable',
            ],
            'desired_experience' => [
                'string',
                'nullable',
            ],
            'number_of_positions' => [
                'nullable',
                'integer',
                'min:1',
                'max:100',
            ],

        ];
    }
}
