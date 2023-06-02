<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['string', 'email', 'max:255'],
            'postcode' => ['required', 'max:8'],
            'address' => ['required', 'max:255'],
            'opinion' => ['required']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['english' => mb_convert_kana($this->english, 'as')]);
    }
}
