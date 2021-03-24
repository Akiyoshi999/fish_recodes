<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecodeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user' => 'required | string | before:2000-01-01',
            'date' => 'required | date',
            'place' => 'required | string',
            'weather' => 'required | string',
            'tide' => 'string',
            'fish' => 'string',
            'temperature' => 'int | between:-10,50',
            'length' => 'int | between:0,200',
            'comment' => 'string | max:500',
            'image' => 'file|image|mimes:png,jpeg',
        ];
    }
}